<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Office;
use App\Models\comments;
class OfficeadminController extends Controller
{

    public function index(Request $request)
    {
        $sort = $request->input('sort');
    
        $query = Office::query();
    
        if ($sort == 'name') {
            $query->orderBy('name');
        } elseif ($sort == 'price') {
            $query->orderBy('price');
        } elseif ($sort == 'location') {
            $query->orderBy('location');
        }
    
        $office = $request->input('name');
    
        if ($office) {
            $query->where(function ($subQuery) use ($office) {
                $subQuery->where('name', 'like', "%{$office}%")
                    ->orWhere('location', 'like', "%{$office}%");
            });
        }
    
        $offices = $query->paginate(3);
    
        return view('Admin.office.index', compact('offices'));
    }



        public function create()
        {
            return view('Admin.office.create');
        }

        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required',
                'price' => 'required',
                'location' => 'required',
                'details' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $office = new Office;
            $office->name = $request->name;
            $office->price = $request->price;
            $office->location = $request->location;
            $office->details = $request->details;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $image->move('assit-user\images', $imageName);
                $office->image = $imageName;
            }

            $office->save();

            return redirect()->route('offices.index')->with('success', 'Office created successfully.');
        }

        public function edit($id)
        {
            $office = Office::findOrFail($id);

            return view('Admin.office.edit', compact('office'));
        }

        public function update(Request $request, $id)
        {
            $request->validate([
                'name' => 'required',
                'price' => 'required',
                'location' => 'required',
                'details' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $office = Office::findOrFail($id);
            $office->name = $request->name;
            $office->price = $request->price;
            $office->location = $request->location;
            $office->details = $request->details;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $image->move('assit-user\images', $imageName);
                $office->image = $imageName;
            }

            $office->save();

            return redirect()->route('offices.index')->with('success', 'Office updated successfully.');
        }

        public function destroy($id)
        {


            $office = Office::findOrFail($id);
            $office->delete();

            return redirect()->route('offices.index')->with('success', 'Office deleted successfully.');
        }




    }
