<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MalfunctionsController;
use App\Http\Controllers\PortfolioController;

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

//Alleen als je ingelogd kan je hier in komen
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/malfunctions', [MalfunctionsController::class, 'index'])->name('malfunctions.index');
    
    Route::middleware(['admin'])->group(function () {
    Route::get('/malfunctions/create', [MalfunctionsController::class, 'create'])->name('malfunctions.create');
    Route::get('/malfunctions/{malfunction}/edit', [MalfunctionsController::class, 'edit'])->name('malfunctions.edit');
    Route::post('/malfunctions', [MalfunctionsController::class, 'store'])->name('malfunctions.store');
    Route::put('/malfunctions/{malfunction}', [MalfunctionsController::class, 'update'])->name('malfunctions.update');
    Route::delete('/malfunctions/{malfunction}', [MalfunctionsController::class, 'destroy'])->name('malfunctions.destroy');
    });
});

require __DIR__.'/auth.php';
