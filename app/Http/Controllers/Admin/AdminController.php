<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\AdminDatatable;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Admin;

class AdminController extends Controller
{
   
// public function __construct()
//     {
//         //create read update delete
//         $this->middleware(['permission:read_users'])->only('index');
//         $this->middleware(['permission:create_users'])->only('create');
//         $this->middleware(['permission:update_users'])->only('edit');
//         $this->middleware(['permission:delete_users'])->only('destroy');

//     }//end of constructor


    public function index(AdminDatatable $admin)
    {
        $admins = Admin::whereRoleIs('admin')->get();
       return $admin->render('admin.admins.index', ['title'=>'Admin Control','admin'=>'admins']);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admins.create', ['title'=>trans('admin.create_admin')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(

        [
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email|unique:admins',
            'password'=>'required|min:6'
          
        ], [],[

            'first_name'=>trans('admin.first_name'),
            'last_name'=>trans('admin.last_name'),
            'email'=>trans('admin.email'),
            'password'=>trans('admin.password'),
        ]);

        $data = $request->except(['password', 'permissions']);
        $data['password'] = bcrypt($request->password);
        $admin = Admin::create($data);
        $admin->attachRole('admin');
        $admin->syncPermissions($request->permissions);
        session()->flash('success', trans('admin.record_added'));
        return redirect(aurl('admins'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('admin.admins.edit',['title'=>trans('admin.edit_admin'),'admin'=>$admin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
    $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', Rule::unique('admins')->ignore($admin->id),],
            'permissions' => 'required|min:1'
        ]);

        $request_data = $request->except(['permissions', 'image']);
        $admin->update($request_data);
        $admin->syncPermissions($request->permissions);
        session()->flash('success', trans('admin.record_updated'));
        return redirect(aurl('admins'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::find($id)->delete();
        session()->flash('success', trans('admin.record_deleted'));
        return redirect(aurl('admins'));
    }

    public function multidelete() {
        if(is_array(request('item')))
        {
            Admin::destroy(request('item'));
        } else {
            Admin::find(request('item'))->delete();
        }
        session()->flash('success', trans('admin.record_deleted'));
        return redirect(aurl('admins'));
    }
}
