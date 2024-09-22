<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MalfunctionsController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\AdminController;

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
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/projects', [ProjectsController::class, 'index'])->name('projects.index');

    //Alleen als je ingelogd als admin kan je hier in komen
    Route::group(['middleware' => 'Admin'], function () {

        Route::get('/projects/create', [ProjectsController::class, 'create'])->name('projects.create');
        Route::get('/projects/{project}/edit', [ProjectsController::class, 'edit'])->name('projects.edit');
        Route::post('/projects', [ProjectsController::class, 'store'])->name('projects.store');
        Route::put('/projects/{project}', [ProjectsController::class, 'update'])->name('projects.update');
        Route::delete('/projects/{project}', [ProjectsController::class, 'destroy'])->name('projects.destroy');
    });    

require __DIR__.'/auth.php';
