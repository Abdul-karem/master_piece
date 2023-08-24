<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\Office;
class SingleofficeController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        // $office = Office::findOrFail($id);

        // return view('User.single_office', compact('office'));
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
        $images = Image::where('office_id', $id)->get();
        return view('User.single_office', compact('office', 'images'));
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
