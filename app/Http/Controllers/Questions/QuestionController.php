<?php

namespace App\Http\Controllers\Questions;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function index(Request $request)
{
    if ($request->user()) {
        // Check if the questions are already in the session
        if ($request->session()->has('questions')) {
            $questions = $request->session()->get('questions');
        } else {
            $categories = ['History', 'Art', 'Geography', 'Science', 'Sports'];
            $questions = [];

            //getting 4 random questions from each category
            foreach ($categories as $cat) {
                $query_questions = Question::inRandomOrder()->where('category', $cat)->limit(4)->get();
                foreach ($query_questions as $qq) {
                    array_push($questions, $qq);
                }
            }

            shuffle($questions);

            // Store the generated questions in the session
            $request->session()->put('questions', $questions);
        }
    } else {
        $questions = [];
    }

    $quiz["questions"]=$questions;
    return view('questions.list', ["quiz" => $quiz]);
}





    public function results(Request $request)
    {
        //get quiz from DB
        $quiz = Quiz::where('user_id', Auth::user()->id)->where('completed', 0)->first();
        $user = User::find(Auth::user()->id);
        
        $results = array('overall' => 0, 'art' => 0, 'geography' => 0, 'history' => 0, 'science' => 0, 'sports' => 0);
        $xp = 0;
        
        //figuring out which answers are correct
        foreach ($request['question'] as $answers) {
            foreach ($answers as $questionId => $answer) {
                $correctAnswer = Answer::where('question_id', $questionId)->where('correct', 1)->value('answer');
                if ($correctAnswer === $answer) {
                    $question = Question::where('id', $questionId)->get()->first();
                    $category = strtolower($question['category']);
                    $results[$category]++;
                    $results['overall']++;
                    $xp += $question['xp'];
                }
            }
        }
        //adding categories score to the user
        foreach ($results as $key => $value) {
            if ($key != 'overall') {
                [$correct, $total] = [explode("/", $user[$key])[0], explode("/", $user[$key])[1]];
                $user[$key] = ($correct + $value) . "/" . ($total + 4);
            }
        }

        //adding xp to the user
        $user['xp'] += $xp;
        
        //save changes in DB
        $user->save();
        if ($quiz != null) {
            //makes quiz completed
            $quiz['completed'] = 1;
            $request->session()->forget('questions');
            $quiz->save();
        }


        return view('questions.results', ['results' => $results]);
    }
}
