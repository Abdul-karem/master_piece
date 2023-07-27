<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Office;
use App\Models\Comment;
use App\Models\Image;
use App\Models\User;
// use App\Models\Product;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Office::query();

        // Default values for min_price and max_price
        $minPrice = $request->input('min_price', 0);
        $maxPrice = $request->input('max_price', PHP_INT_MAX);

        // Filter by price range
        if ($request->has('min_price') || $request->has('max_price')) {
            $query->whereBetween('price', [$minPrice, $maxPrice]);
        }

        $office = $request->input('location');

        if ($office) {
            $query->where(function ($subQuery) use ($office) {
                $subQuery->where('name', 'like', "%{$office}%")
                    ->orWhere('location', 'like', "%{$office}%");
            });
        }


        $products = $query->get();

        return view('User.index', compact('products'));


        // $offices = $query->paginate(3);

        // return view('User.index', compact('offices'));
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
        $office = Office::findOrFail($id);
        $comments = Comment::where('office_id', $id)->get();
        $images = Image::where('office_id', $id)->get();
        $user = User::where('id', $office->user_id)->firstOrFail();
        return view('User.single_office', compact('office', 'comments', 'images' , 'user'   ));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
