<?php

namespace App\Http\Controllers;

use App\Models\User;

class MeetingController extends Controller
{
    public function show($id)
    {
        $user = User::with('meetings')->findOrFail($id);

        return view('meetings.show', compact('user'));
    }
}
