<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function store(Request $request)
    {
        if (Auth::check()) {
            $userQuizzes = Quiz::where('user_id', Auth::user()->id)->get();
            if ($userQuizzes->isEmpty() || $userQuizzes->last()->completed == 1) {
                Quiz::create([
                    'completed' => 0,
                    'user_id' => Auth::user()->id
                ]);
            }
            return redirect()->route('quiz');
        } else {
            return redirect()->route('login');
        }
    }
}