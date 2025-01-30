<?php

namespace App\Http\Controllers;

use App\Models\Property; // Ensure you import the Property model
use Illuminate\Http\Request;
use App\Http\Controllers\PropertyController;


class PropertyController extends Controller
{

    public function cadogan($id)
    {
        return view('pages.cadogan', ['id' => $id]);
    }
    public function victory($id)
    {
        return view('pages.victory', ['id' => $id]);
    }
    public function milverton($id)
    {
        return view('pages.milverton', ['id' => $id]);
    }

    public function properties()
    {
        // Fetch all properties from the database
        $properties = Property::all();

        // Pass properties data to the view
        return view('properties', compact('properties'));
    }

    public function apartments()
{
    $properties = Property::all();

    return view('apartments', compact('properties'));
}

    public function show($id)
    {
        // Retrieve the property by its ID
        $property = Property::findOrFail($id);

        // Return the view with the property details
        return view('apartments', compact('property'));
    }


}
