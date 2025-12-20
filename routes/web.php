<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\PublicController::class)->group(function() {
    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/services', 'services')->name('services');
    Route::get('/services/{service:slug}', 'showService')->name('services.show');
    Route::get('/gallery', 'gallery')->name('gallery');
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/contact', 'sendMessage')->name('contact.store');
});

Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
    Route::put('settings/update', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('settings.update_all');
    Route::resource('settings', \App\Http\Controllers\Admin\SettingController::class)->except(['update']);
    Route::resource('abouts', \App\Http\Controllers\Admin\AboutController::class);
    Route::resource('services', \App\Http\Controllers\Admin\ServiceController::class);
    Route::resource('galleries', \App\Http\Controllers\Admin\GalleryController::class);
    Route::resource('messages', \App\Http\Controllers\Admin\MessageController::class);
    
    // About Us Related Management
    Route::resource('missions', \App\Http\Controllers\Admin\MissionController::class);
    Route::resource('company-values', \App\Http\Controllers\Admin\CompanyValueController::class);
    Route::resource('team-members', \App\Http\Controllers\Admin\TeamMemberController::class);
    Route::resource('certifications', \App\Http\Controllers\Admin\CertificationController::class);
    
    // AJAX routes for ordering
    Route::post('missions/reorder', [\App\Http\Controllers\Admin\MissionController::class, 'reorder'])->name('missions.reorder');
    Route::post('company-values/reorder', [\App\Http\Controllers\Admin\CompanyValueController::class, 'reorder'])->name('company-values.reorder');
    Route::post('team-members/reorder', [\App\Http\Controllers\Admin\TeamMemberController::class, 'reorder'])->name('team-members.reorder');
    Route::post('certifications/reorder', [\App\Http\Controllers\Admin\CertificationController::class, 'reorder'])->name('certifications.reorder');
    
    // AJAX routes for toggle active
    Route::post('missions/{mission}/toggle', [\App\Http\Controllers\Admin\MissionController::class, 'toggle'])->name('missions.toggle');
    Route::post('company-values/{companyValue}/toggle', [\App\Http\Controllers\Admin\CompanyValueController::class, 'toggle'])->name('company-values.toggle');
    Route::post('team-members/{teamMember}/toggle', [\App\Http\Controllers\Admin\TeamMemberController::class, 'toggle'])->name('team-members.toggle');
    Route::post('certifications/{certification}/toggle', [\App\Http\Controllers\Admin\CertificationController::class, 'toggle'])->name('certifications.toggle');
});

require __DIR__.'/auth.php';
