<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\property;

class HomeController extends Controller
{
    public function home()
    {
        $properties = Property::all();
        return view('home', compact('properties'));

    }

    public function homepage()
    {
        $properties = Property::all();
        return view('homepage', compact('properties'));    }
}
