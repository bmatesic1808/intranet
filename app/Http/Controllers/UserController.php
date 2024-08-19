<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function show($id)
    {
        $user = User::with('personalInformation')->findOrFail($id);
        $employees = User::all();

        return view('users.show', compact('user', 'employees'));
    }

    public function showPointsPerMonth($id)
    {
        $months = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December',
        ];

        $user = User::with('points')->findOrFail($id);

        return view('users.points', compact('user', 'months'));
    }
}
