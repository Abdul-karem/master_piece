<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comment;

class UserDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = User::whereIn('role_id', [2]);

        $sort = $request->input('sort');
        $name = $request->input('name');

        if ($sort == 'id') {
            $query->orderBy('id')->paginate(3);
        } elseif ($sort == 'name') {
            $query->orderBy('name')->paginate(3);
        } elseif ($sort == 'email') {
            $query->orderBy('email')->paginate(3);
        }

        if ($name) {
            $query->where('name', 'like', "%{$name}%")
            ->orWhere('email', 'like', '%' . $name . '%')
            ->orWhere('mobile', 'like', '%' . $name . '%');
            ;
        }

        $users = $query->paginate(5);

        return view('Admin.userdashboard.index', compact('users'));
    }
    
    public function create()
    {
        return view('Admin.UserDashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = 2;
        $user->mobile = $request->mobile;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move('assit-user\images', $imageName);
            $user->image = $imageName;
        }

        $user->save();

        return redirect()->route('userdashboard.index')->with('success', 'user created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view('Admin.userdashboard.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('Admin.userdashboard.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->mobile = $request->input('mobile');
        $user->image = $request->input('image');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move('assit-user\images', $imageName);
            $user->image = $imageName;
        }

        $user->save();

        return redirect()->route('userdashboard.index')->with('success', 'User updated successfully');

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Comment::where('user_id', $id)->update(['user_id' => null]);
    
        $user = User::find($id);
        $user->delete();
    
        return redirect()->back()->with('success', 'User deleted successfully.');
    }
    

    }
