<?php


namespace App\Http\Controllers\Lessor;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use App\Models\Office;

use App\Models\Comment;

class LessordashController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Retrieve the total number of offices for the logged-in user
        $totalOffices = Office::where('user_id', $user->id)->count();
        
        // Retrieve the total number of reservations for the logged-in user
        // $totalReservations = Reservations::whereHas('office', function ($query) use ($user) {
        //     $query->where('user_id', $user->id);
        // })->count();
        
        // // Retrieve the average price of reservations for the logged-in user
        // $averagePrice = Reservations::whereHas('office', function ($query) use ($user) {
        //     $query->where('user_id', $user->id);
        // })->avg('price');
        
       // Retrieve the average rating from the comments table
    $averageRating = Comment::whereHas('office', function ($query) use ($user) {
        $query->where('user_id', $user->id);
    })->avg('rate');
    
    return view('lessor.index', compact('totalOffices', 'averageRating'));
    }
    
    // other methods
}