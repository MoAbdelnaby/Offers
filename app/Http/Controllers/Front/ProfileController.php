<?php

namespace App\Http\Controllers\Front;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('style.profile', compact('user'));
    }


    public function edit($id)
    {
        $user = User::find($id);
     return view('style.edit', compact('user'));
    }

  
    public function update(Request $request, $id)
    {
        $request->validate([

            'name' => 'required',
            'email'=>'required|email|unique:users,email,'.$id,
            'image' => 'sometimes|nullable|'.v_image(),
            'password'=>'sometimes|nullable|min:6',
            'level'=>'required|in:user,company,vendor',
        ]);


        $request_data = $request->except(['password', 'image','_method', '_token']);

         if(request()->has('password')) {
            $request_data['password'] = bcrypt(request('password'));
        }

         if(request()->hasFile('image'))
        {
            $request_data['image'] = up()->upload([      // upload method in Upload.php controller
                'file'=>'image',
                'path'=>'users',             //folder
                'upload_type'=>'single',
                'delete_file'=>User::find($id)->image, // helper function

            ]);
         } else {
            $request_data['image'] = User::find($id)->image;
        }
       // dd($request_data);
         User::where('id', $id)->update($request_data);
        session()->flash('success', trans('admin.record_updated'));
        return redirect('profile');

        }
   


}
