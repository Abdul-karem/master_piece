<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Models\Office;




class DashboardAdminController extends Controller
{
    public function index()
    {
        $user = auth()->user(); // Retrieve the authenticated user
        return view('Admin.profile', compact('user'));
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|digits:10',
            'password' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password =Hash::make ($request->password);
        $user->mobile = $request->mobile;
        // $user->image = $request->image;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('assit-user\images', $imageName);
            $user->image = $imageName;
        }

        $user->save();

        return view('Admin.profile', compact('user'))->with('success', 'Profile updated successfully.');
    }

    public function index2()
    {
        // Retrieve the total number of users with role_id = 2
        $totalUsers = User::where('role_id', 2)->count();
        
        // Retrieve the total number of lessors with role_id = 3
        $totalLessors = User::where('role_id', 3)->count();
        
        // Retrieve the total number of offices
        $totalOffices = Office::count();
        
        // Retrieve the total number of reservations
        // $totalReservations = Reservations::count();
        
        return view('Admin.index', compact('totalUsers', 'totalLessors', 'totalOffices'));
    }
}


