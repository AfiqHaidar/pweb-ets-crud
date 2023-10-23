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
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [
    PersonController::class, 'index'
])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/form.add', function () {
    return view('form.add');
})->middleware(['auth', 'verified'])->name('add');
Route::post('/form.add', [PersonController::class, 'store'])->name('person.store');

Route::get('/person/{id}', [PersonController::class, 'detail'])->name('person.details');
Route::delete('/person/{id}', [PersonController::class, 'destroy'])->name('person.destroy');
Route::put('/person/{id}', [PersonController::class, 'update'])->name('person.update');

Route::get('/person/{id}/edit', [PersonController::class, 'edit'])->name('person.edit');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
