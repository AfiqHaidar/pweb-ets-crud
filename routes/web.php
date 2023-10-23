<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// ------------------------------------------------------------------------------------------------

// get person list
Route::get('/dashboard', [
    PersonController::class, 'index'
])->middleware(['auth', 'verified'])->name('person.dashboard');

// create person
Route::get('/person/add', function () {
    return view('person.add');
})->middleware(['auth', 'verified'])->name('person.add');
Route::post('/person/add', [PersonController::class, 'store'])->name('person.store');

// get details person
Route::get('/person/{id}', [PersonController::class, 'detail'])->name('person.details');

// show
Route::get('/person', [PersonController::class, 'show'])->name('person.show');

// delete person
Route::delete('/person/{id}', [PersonController::class, 'destroy'])->name('person.destroy');

//update person
Route::put('/person/{id}', [PersonController::class, 'update'])->name('person.update');
Route::get('/person/{id}/edit', [PersonController::class, 'edit'])->name('person.edit');

// ----------------------------------------------------------------------------------------------------

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
