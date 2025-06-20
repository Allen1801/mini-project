<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Controller;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/add-employee', [Controller::class, 'add'])->name('employees.add');

Route::put('/update-employee/{id}', [Controller::class, 'update'])->name('employees.update');

Route::delete('/delete-employee/{id}', [Controller::class, 'delete'])->name('employees.delete');

Route::get('/employee-table', [Controller::class, 'index'])->name('employee-table');

Route::get('/dashboard', [Controller::class, 'stats'])->name('dashboard');


require __DIR__.'/auth.php';
