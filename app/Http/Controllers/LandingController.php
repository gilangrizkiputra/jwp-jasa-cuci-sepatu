<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;

class LandingController extends Controller
{
     public function index()
    {
        $catalogs = Catalog::all();
        return view('landing', compact('catalogs'));
    }
}
