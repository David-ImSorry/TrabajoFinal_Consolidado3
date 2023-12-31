<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
include __DIR__.'/auth.php';
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
Route::get('/dashboard', function () {
    return view('dashboard');  
    

})->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/categories',[CategoryController::class, 'index'])->name('categories.index');
    Route::post('/categories',[CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/create',[CategoryController::class, 'create'])->name('categories.create');
    Route::delete('/categories/{category}',[CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::put('/categories/{category}',[CategoryController::class, 'update'])->name('categories.update');
    Route::get('/categories/{category}/edit',[CategoryController::class, 'edit'])->name('categories.edit');

       
    Route::get('/paymodes',[PaymodeController::class, 'index'])->name('paymodes.index');
    Route::post('/paymodes',[PaymodeController::class, 'store'])->name('paymodes.store');
    Route::get('/paymodes/create',[PaymodeController::class, 'create'])->name('paymodes.create');
    Route::delete('/paymodes/{paymode}',[PaymodeController::class, 'destroy'])->name('paymodes.destroy');
    Route::put('/paymodes/{paymode}',[PaymodeController::class, 'update'])->name('paymodes.update');
    Route::get('/paymodes/{paymode}/edit',[PaymodeController::class, 'edit'])->name('paymodes.edit');
    
    Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        
    Route::get('/', function () {
        return view('sisven');
    });
});

require __DIR__.'/auth.php';
