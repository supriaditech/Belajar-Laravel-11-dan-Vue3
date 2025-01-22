<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('User/Index', [
        "user" => [
            [
                "id" => 1,
                "nama" => "supriadi",
                "umur" => 23,
                "lulusan" => "UNIMED"
            ],
            [
                "id" => 2,
                "nama" => "Canty",
                "umur" => 23,
                "lulusan" => "UNIMED"
            ],
        ],
    ]);
})->name("user");


Route::get('/user/detail/{id}', function ($id) {
    return inertia::render("User/Detail", [
        "user" => [
            "id" => $id,
            "nama" => "user" . $id,
        ]
    ]);
})->name("user.detail");

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
