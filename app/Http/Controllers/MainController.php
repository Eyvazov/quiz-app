<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Quiz;
use App\Models\Answer;
use App\Models\Result;

class MainController extends Controller
{
    public function dashboard(){
        $quizzes = Quiz::where('status', 'publish')->where(function ($query){
            $query->whereNull('finished_at')->orWhere('finished_at', '>', now());
        })->withCount('questions')->paginate(5);
        $results = auth()->user()->results;
        return view('dashboard', compact('quizzes', 'results'));
    }


    public function quizDetail($slug){
        $quiz = Quiz::whereSlug($slug)->with('myResult', 'topTen.user')->withCount('questions')->first() ?? abort(404, 'Test tapılmadı!');

        return view('quiz-detail', compact('quiz'));
    }
    public function quiz($slug){
        $quiz = Quiz::whereSlug($slug)->with('questions.myAnswer', 'myResult')->first() ?? abort(404, 'Test Tapılmadı!');
        if ($quiz->myResult){
            return view('quiz_result', compact('quiz'));
        }
        return view('quiz', compact('quiz'));
    }

    public function result(Request $request, $slug){
        $quiz = Quiz::with('questions')->whereSlug($slug)->first() ?? abort(404, 'Test Tapılmadı');
        $correct = 0;

        if ($quiz->myResult){
            abort(404, 'Bu Testdə Əvvəlcədən İştirak Etmisiniz.');
        }

        foreach ($quiz->questions as  $question){
            Answer::create([
                'user_id' => auth()->user()->id,
                'question_id' => $question->id,
                'answer' => $request->post($question->id)
            ]);


            if ($question->correct_answer === $request->post($question->id)){
                $correct+=1;
            }
        }

        $point = round((100 / count($quiz->questions)) * $correct);
        $wrong = count($quiz->questions) - $correct;

        Result::create([
           'user_id' => auth()->user()->id,
            'quiz_id' => $quiz->id,
            'point' => $point,
            'correct' => $correct,
            'wrong' => $wrong,
        ]);

        return redirect()->route('quiz.detail', $quiz->slug)->withSuccess('Müvəffəqiyyətlə Testi bitirdinz. Sənin Xalın: ' . $point);
    }
}
