<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth()->user();
    
        //variables that will be used to display user score in each category
        $art = explode('/', $user->art);
        $geography = explode('/', $user->geography);
        $history = explode('/', $user->history);
        $science = explode('/', $user->science);
        $sports = explode('/', $user->sports);
    
        return view('profile', compact('art', 'geography', 'history', 'science', 'sports'));
    }    
}
