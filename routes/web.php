<?php

use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProfileController;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
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
    return view('auth.login');
})->name('welcome');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Save plans
    Route::get('/save-plans', [PlanController::class, 'savePlans'])->name('save-plans');
    Route::get('/asp', [PlanController::class, 'addSavePlan'])->name('add-save-plan');
    Route::post('/csp', [PlanController::class, 'createSavePlan'])->name('create-save-plan');
    Route::get('/psp/{plan}', [PlanController::class, 'printSavePlan'])->name('print-save-plan');
    Route::get('/esp/{plan}', [PlanController::class, 'editSavePlan'])->name('edit-save-plan');
    Route::post('/usp/{plan}', [PlanController::class, 'updateSavePlan'])->name('update-save-plan');
    Route::post('/dsp/{plan}', [PlanController::class, 'deleteSavePlan'])->name('delete-save-plan');

    // Review plans
    Route::get('/review-plans', [PlanController::class, 'reviewPlans'])->name('review-plans');
    Route::get('/arp', [PlanController::class, 'addReviewPlan'])->name('add-review-plan');
    Route::post('/crp', [PlanController::class, 'createReviewPlan'])->name('create-review-plan');

    Route::get('/prp/{plan}', [PlanController::class, 'printReviewPlan'])->name('print-review-plan');
    Route::get('/erp/{plan}', [PlanController::class, 'editReviewPlan'])->name('edit-review-plan');
    Route::post('/urp/{plan}', [PlanController::class, 'updateReviewPlan'])->name('update-review-plan');
    Route::post('/drp/{plan}', [PlanController::class, 'deleteReviewPlan'])->name('delete-review-plan');

});

require __DIR__ . '/auth.php';
