<?php

namespace App\Http\Controllers;

use App\Models\User;

class PerformanceReviewController extends Controller
{
    public function show($id)
    {
        $user = User::with('performanceReviews')->findOrFail($id);

        return view('performance-reviews.show', compact('user'));
    }
}
