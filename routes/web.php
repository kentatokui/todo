<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

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
Route::group(['middleware' => 'auth'], function() {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/folders/create', [ FolderController::class, 'showCreateForm' ])->name('folders.create');
    Route::post('/folders/create', [ FolderController::class, 'create' ]);
    
    Route::group(['middleware' => 'can:view,folder'], function() {
        Route::get('/folders/{folder}/tasks', [ TaskController::class, 'index' ])->name('tasks.index');

        Route::get('/folders/{folder}/tasks/create', [TaskController::class,'showCreateForm'])->name('tasks.create');
        Route::post('/folders/{folder}/tasks/create', [TaskController::class,'create']);

        Route::get('/folders/{folder}/tasks/{task}/edit', [TaskController::class, 'showEditForm'])->name('tasks.edit');
        Route::post('/folders/{folder}/tasks/{task}/edit', [TaskController::class, 'edit']);
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

