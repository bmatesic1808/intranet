<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SickLeaveController extends Controller
{
    public function index()
    {
        return view('sick-leave.index');
    }

    public function show($id)
    {
        $employee = User::findOrFail($id);
        return view('sick-leave.show', compact('employee'));
    }
}
