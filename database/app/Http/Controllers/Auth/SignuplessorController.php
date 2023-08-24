<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SignuplessorController extends Controller
{

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name2' => 'required',
            'email2' => 'required|email|unique:users,email',
            'password2' => 'required|min:8|confirmed',
            'mobile_number' => 'required|digits:10',
            'imagelessor' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $file_extinension = $request -> imagelessor -> getClientOriginalExtension();
        $file_name = time().'.'.$file_extinension;
        $path = 'assit-user/images' ;
        $request -> imagelessor -> move($path, $file_name );

        // Create the user record
        $user = User::create([
            'name' => $request->input('name2'),
            'email' => $request->input('email2'),
            'password' => Hash::make($request->input('password2')),
            'role_id' => 3,
            'mobile' =>  $request->input('mobile_number'),
            'image' => $file_name,
        ]);
        
        // Log in the user
        Auth::login($user);

        // Store user_id in the session
        Session::put('user_id', $user->id);

        // Clear login form validation errors
        $request->session()->forget('errors');

        // Flash the success message
        session()->flash('signup-success', 'Register done successfully. You can now login.');

        return redirect()->route('lessor');
    }

}

