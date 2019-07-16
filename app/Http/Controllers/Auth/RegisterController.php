<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'level'=>['required', Rule::in(['user','company','vendor']), ],
            'image'=>'sometimes|nullable|'.v_image(),
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
       
         if(request()->hasFile('image'))
        {
            
            $data['image'] = up()->upload([      // upload method in Upload.php controller
                'file'=>'image',
                'path'=>'users',             //folder
                'upload_type'=>'single',
                'delete_file'=>'', // helper function

            ]);
        } else {
            $data['image']= 'users/default.png';
        }


        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'level' => $data['level'],
            'image' => $data['image'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
