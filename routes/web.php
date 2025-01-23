<?php

use App\Http\Resources\QuestionResourece;
use App\Models\Question;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('User/Index');
})->name("user");


Route::get('/user/detail/{id}', function ($id) {
    return inertia::render("User/Detail", [
        "user" => [
            "id" => $id,
            "nama" => "user" . $id,
        ]
    ]);
})->name("user.detail");

Route::get('question', function () {
    $Question = QuestionResourece::collection(Question::with('user')->latest()->paginate(15));

    return Inertia::render('Question/Index', [
        "Question" => $Question
    ]);
})->name("question");

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
