<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');


Route::middleware(['auth', 'verified'])->group(function () {
    // rotte accessibili SOLO se si è loggati e verificati
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // rotte per la risorsa del sito
    Route::get('/films/create',     [FilmController::class, 'create'])->name('films.create');
    Route::get('/films/{id}/edit',  [FilmController::class, 'edit'])->name('films.edit');
    Route::post('/films',           [FilmController::class, 'store'])->name('films.store');
    Route::put('/films/{id}',       [FilmController::class, 'update'])->name('films.update');
    Route::delete('/films/{id}',    [FilmController::class, 'destroy'])->name('films.destroy');
});

Route::get('/films',            [FilmController::class, 'index'])->name('films.index');
Route::get('/films/list',       [FilmController::class, 'list'])->name('films.list');
Route::get('/films/{id}',       [FilmController::class, 'show'])->name('films.show');

Route::middleware('auth')->group(function () {
    // queste rotte sono accessibili SOLO se si è loggati anche se non si è verificati
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('guest')->group(function () {
    // queste rotte sono accessibili SOLO se NON si è loggati
});


require __DIR__ . '/auth.php';
