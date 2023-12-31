<?php

use App\Http\Controllers\TaskController;
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
Route::get('task/completed', [TaskController::class, 'completed'])->name('task.completed');
Route::get('task/incompleted', [TaskController::class, 'incompleted'])->name('task.incompleted');
Route::put('/task/{id}/status', [TaskController::class, 'updateStatus']);
Route::resource('/task', TaskController::class);