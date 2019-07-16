<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\UsersDatatable;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
// public function __construct()
// {

//     $this->middleware(['permission:read_users'])->only('index');
//     $this->middleware(['permission:create_users'])->only('create');
//     $this->middleware(['permission:update_users'])->only('update');
//     $this->middleware(['permission:delete_users'])->only('destroy');
// }


    public function index(UsersDatatable $admin)
    {
       return $admin->render('admin.users.index', ['title'=>trans('admin.users')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create', ['title'=>trans('admin.add')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data = $this->validate(request(),

        [
            'name'=>'required',
            'level'=>'required|in:user,company,vendor',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6'
        ], [],[

            'name'=>trans('admin.name'),
            'level'=>trans('admin.level'),
            'email'=>trans('admin.email'),
            'password'=>trans('admin.password'),
        ]);
        $data['password'] = bcrypt(request('password'));
        User::create($data);
        session()->flash('success', trans('admin.record_added'));
        return redirect(aurl('users'));
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
        $admin = User::find($id);
        return view('admin.users.edit',['title'=>trans('admin.edit_admin'),'user'=>$admin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    $data = $this->validate(request(),

        [
            'name'=>'required',
            'level'=>'required|in:user,company,vendor',
            'email'=>'required|email|unique:users,email,'.$id,
            //'email'=>'required|email|unique:users,id,'.$id,
            'password'=>'sometimes|nullable|min:6'
        ], [],[

            'name'=>trans('admin.name'),
            'level'=>trans('admin.level'),
            'email'=>trans('admin.email'),
            'password'=>trans('admin.password'),
        ]);

        if(request()->has('password')) {
            $data['password'] = bcrypt(request('password'));
        }

        User::where('id', $id)->update($data);
        session()->flash('success', trans('admin.record_updated'));
        return redirect(aurl('users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        session()->flash('success', trans('admin.record_deleted'));
        return redirect(aurl('users'));
    }

    public function multidelete() {
        if(is_array(request('item')))
        {
            User::destroy(request('item'));
        } else {
            User::find(request('item'))->delete();
        }
        session()->flash('success', trans('admin.record_deleted'));
        return redirect(aurl('users'));
    }
}
