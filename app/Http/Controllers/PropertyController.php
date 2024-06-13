<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        return view('property.create');
    }

    public function store(Request $request)
    {
       $seller = auth()->user();
        $data = $request->validate([
            'name' => ['required'],
            'price' => ['required'],
            'listedFor' => ['required'],
            'location' => ['required'],
        ]);

        Property::create([
            'name' => $data['name'],
            'price' => $data['price'],
            'listedFor' => $data['listedFor'],
            'location' => $data['location'],
            'seller_id' => $seller->id,

        ]);

        return redirect()->route('admin.property.option');
    }

    public function edit($id)
    {
        $properties = Property::find($id);
        return view('property.edit', compact('properties'));
    }


    public function show(Property $property)
    {
        $properties = Property::all();

        return view('property.show', compact('properties'));
    }

    public function update(Request $request, Property $property)
    {
        $seller = auth()->user();
        $data = $request->validate([
            'name' => ['required'],
            'price' => ['required'],
            'listedFor' => ['required'],
            'location' => ['required'],
        ]);


        $property->update([
            'name' => $data['name'],
            'price' => $data['price'],
            'listedFor' => $data['listedFor'],
            'location' => $data['location'],
            'seller_id' => $seller->id,
        ]);

        return redirect()->route('admin.property.option');
    }

    public function destroy(Property $property)
    {

        $property->delete();

        return redirect()->route('admin.property.show');
    }
}
