<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TAController;

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
Route::get('/student', function () {
    return view('student');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('HomeTA',[TAController::class, "TA"])->name('TA');
Route::get('HomeTA', [TAController::class, 'name'])->name('name');
Route::get('TAaddsc', [TAController::class, 'TAadd'])->name('TAadd');
Route::get('TAview', [TAController::class, 'TAview'])->name('TAview');

