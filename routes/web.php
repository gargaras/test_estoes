<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/projects', [App\Http\Controllers\ProjectController::class, 'index'])->name('projects.index');;
Route::get('/projects/create', [App\Http\Controllers\ProjectController::class, 'create'])->name('projects.create');
Route::post('/projects/store',[App\Http\Controllers\ProjectController::class, 'store'])->name('projects.store');
Route::get('/projects/{id}',[App\Http\Controllers\ProjectController::class, 'edit'])->name('projects.edit');
Route::post('/projects',[App\Http\Controllers\ProjectController::class, 'update'])->name('projects.update');
Route::get('/projects/delete/{id}', [App\Http\Controllers\ProjectController::class, 'delete'])->name('projects.delete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
