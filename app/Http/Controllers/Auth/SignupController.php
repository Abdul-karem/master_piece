<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;

class SignupController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email1' => 'required|email|unique:users,email',
            'password1' => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create the user record
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email1'),
            'password' => Hash::make($request->input('password1')),
            'role_id' => 2,
            'mobile' => 'null',
        ]);

        // Log in the user
        Auth::login($user);

        // Store user_id in the session
        Session::put('user_id', $user->id);

        // Clear login form validation errors
        Session::forget('errors');

        // Flash the success message
        session()->flash('signup-success', 'Registration done successfully. You can now login.');

        return redirect('home');
    }
}