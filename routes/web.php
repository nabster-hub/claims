<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnnulationController;
use App\Http\Controllers\ConnectController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClaimController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
   Route::get('/', [ClaimController::class, 'index'])->name('dashboard');
   Route::get('/create', [ClaimController::class, 'create'])->name('claim.create');
   Route::get("/claims", [ClaimController::class, 'allClaims'])->name('claim.index');
   Route::post('/claim/create', [ClaimController::class, 'store'])->name('claim.store');
   Route::get('/claim/step-one/{claim}', [ClaimController::class, 'stepOne'])->name('claim.stepOne');
   Route::post('/claim/step-one/{claim}', [ClaimController::class, 'stepOneUpdate'])->name('claim.stepOneUpdate');
   Route::get('/claim/step-two/{claim}', [ClaimController::class, 'stepTwo'])->name('claim.stepTwo');
   Route::put('/claim/step-two/{claim}', [ClaimController::class, 'stepTwoUpdate'])->name('claim.stepTwoUpdate');
   Route::get('/claim/step-three/{claim}', [ClaimController::class, 'stepThree'])->name('claim.stepThree');
   Route::put('/claim/step-three/{claim}', [ClaimController::class, 'stepThreeUpdate'])->name('claim.stepThreeUpdate');
   Route::get('/claim/annulation/{claim}', [AnnulationController::class, 'show'])->name('claim.annulation');
   Route::post('/claim/annulation', [AnnulationController::class, 'update'])->name('claim.annulated');
   Route::get('/claim/{claim}', [ClaimController::class, 'show'])->name('claim.show');
   Route::get('/claim/{claim}/tech', [ClaimController::class, 'edit'])->name('claim.tech');
   Route::put('/claim/{claim}/tech', [ClaimController::class, 'updateTech'])->name('claim.updateTech');
   Route::delete('/claim/{claim}', [ClaimController::class, 'destroy'])->name('claim.destroy');
   Route::put('/claim/{claim}', [ClaimController::class, 'update'])->name('claim.update');

});

Route::prefix('connect')->middleware('auth')->group(function () {
    Route::get('/{claim}', [ConnectController::class, 'show'])->name('connect.show');
    Route::get('/{claim}/edit', [ConnectController::class, 'edit'])->name('connect.edit');
    Route::post('/{claim}', [ConnectController::class, 'store'])->name('connect.store');
    //Route::get();
});

Route::prefix("panel")->middleware('auth')->group(function () {
   Route::get('/', [AdminController::class, 'index'])->name('panel.index');
});

Route::middleware('auth')->prefix('reports')->group(function () {
    Route::get('/', function (){
        return "<h1>Страница в процессе разработки</h1>>";
    })->name('reports.index');
});

require __DIR__.'/auth.php';
require __DIR__.'/report.php';
