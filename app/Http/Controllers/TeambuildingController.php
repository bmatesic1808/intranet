<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeambuildingController extends Controller
{
    public function index()
    {
        return view('teambuilding.index');
    }
}
