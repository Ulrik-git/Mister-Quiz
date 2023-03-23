<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class LeaderboardController extends Controller
{
    public function index()
    {
        $users = User::select('username', 'xp', 'art', 'geography', 'history', 'science', 'sports', DB::raw('art + geography + history + science + sports AS total_correct'))
            ->orderByDesc('xp')
            ->limit(10)
            ->get();

        return view('leaderboard', compact('users'));
    }
}
