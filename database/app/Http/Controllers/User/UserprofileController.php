<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
 
 use Illuminate\Support\Facades\Auth;


class UserprofileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Import the correct model

    public function index()
    {
        $user = Auth::user();
        // $user = session('user_id');
        if (!$user) {
            return redirect()->route('login')->with('error', 'You must log in.'); // Redirect to login if user is not authenticated
        }
    
        $user = auth()->user(); // Retrieve the authenticated user
        return view('User.userprofile', compact('user'));

    }
    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
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

    if (!$user) {
        return redirect()->route('userprofile.index')->with('error', 'لم يتم العثور على المستخدم.');
    }

    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->mobile = $request->mobile;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move('assit-user\images', $imageName);
        $user->image = $imageName;
    }

    $user->save();


    return redirect()->back()->with('success', ' Updated successfully.');
}


    

}