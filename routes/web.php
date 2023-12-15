<?php

use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProfileController;
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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // view save plans
    Route::get('/save-plans', [PlanController::class, 'savePlans'])->name('save-plans');

    // asp = add save plan
    Route::get('/asp', [PlanController::class, 'addSavePlan'])->name('add-save-plan');

    //csp = create save plan
    Route::post('/csp', [PlanController::class, 'createSavePlan'])->name('create-save-plan');

    //psp = print save plan
    Route::get('/psp/{plan}', [PlanController::class, 'printSavePlan'])->name('print-save-plan');

    // view review plans
    Route::get('/review-plans', [PlanController::class, 'reviewPlans'])->name('review-plans');

    // arp = add review plan
    Route::get('/arp', [PlanController::class, 'addReviewPlan'])->name('add-review-plan');
});

require __DIR__ . '/auth.php';
