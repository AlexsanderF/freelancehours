<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\SubmitProjectsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProjectsController::class, 'index'])->name('project.index');

Route::get('/project/{project}', [ProjectsController::class, 'show'])->name('project.show');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/submitprojects', [SubmitProjectsController::class, 'index'])->name('submitprojects.index');
    Route::get('/submitprojects/create', [SubmitProjectsController::class, 'create'])->name('submitprojects.create');
    Route::post('/submitprojects/store', [SubmitProjectsController::class, 'store'])->name('submitprojects.store');
    Route::get('/submitprojects/{cnd_cnpj}/edit', [SubmitProjectsController::class, 'edit'])->name('submitprojects.edit');
    Route::put('/submitprojects/{cnd_cnpj}', [SubmitProjectsController::class, 'update'])->name('submitprojects.update');
    Route::delete('/submitprojects/{cnd_cnpj}', [SubmitProjectsController::class, 'destroy'])->name('submitprojects.destroy');

});

require __DIR__ . '/auth.php';
