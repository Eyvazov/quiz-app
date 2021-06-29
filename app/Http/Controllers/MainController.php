<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Quiz;

class MainController extends Controller
{
    public function dashboard(){
        $quizzes = Quiz::where('status', 'publish')->withCount('questions')->paginate(5);
        return view('dashboard', compact('quizzes'));
    }

    public function quizDetail($slug){
        $quiz = Quiz::whereSlug($slug)->withCount('questions')->first() ?? abort(404, 'Test tapılmadı!');
        return view('quiz-detail', compact('quiz'));
    }
    public function quiz($slug){
        $quiz = Quiz::whereSlug($slug)->with('questions')->first();
        return view('quiz', compact('quiz'));
    }

    public function result(Request $request, $slug){
        return $request->post();
    }
}
