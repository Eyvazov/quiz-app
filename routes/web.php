<?php

use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function (){
    Route::get('panel', [MainController::class, 'dashboard'])->name('dashboard');
    Route::get('quiz/detail/{slug}', [MainController::class, 'quizDetail'])->name('quiz.detail');
});

Route::group(['middleware' => ['auth', 'isAdmin'], 'prefix' => 'admin'], function () {
    Route::get('quizzes/{id}', [QuizController::class, 'destroy'])->whereNumber('id')->name('quizzes.destroy');
    Route::get('quiz/{quiz_id}questions/{id}', [QuestionController::class, 'destroy'])->whereNumber('id')->name('question.destroy');
    Route::resource('quizzes', QuizController::class);
    Route::resource('quiz/{quiz_id}/questions', QuestionController::class);
});
