<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DestinationController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\RegistrationController as AdminRegistrationController;
use App\Http\Controllers\Admin\SettingController;

// ─── Frontend Routes ─────────────────────────────────────────────────
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/registernow', [HomeController::class, 'registerNow'])->name('register.page');
Route::post('/register', [RegistrationController::class, 'store'])->name('register.store');
Route::get('/study-abroad/{slug}', [HomeController::class, 'showDestination'])->name('study-abroad.show');
Route::get('/blog', [HomeController::class, 'showBlogIndex'])->name('blog.index');
Route::get('/blog/{slug}', [HomeController::class, 'showBlog'])->name('blog.show');

// ─── Admin Auth ───────────────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login',  [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.post');
    Route::post('logout',[AuthController::class, 'logout'])->name('logout');

    // ─── Protected Admin Routes ──────────────────────────────────────
    Route::middleware('admin')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Resources
        Route::resource('destinations', DestinationController::class)->except(['show']);
        Route::resource('services',     ServiceController::class)->except(['show']);
        Route::resource('testimonials', TestimonialController::class)->except(['show']);
        Route::resource('events',       EventController::class)->except(['show']);
        Route::resource('blog',         BlogController::class)->except(['show']);
        Route::resource('faqs',         FaqController::class)->except(['show']);

        // Registrations
        Route::get('registrations',                             [AdminRegistrationController::class, 'index'])->name('registrations.index');
        Route::get('registrations/{registration}',             [AdminRegistrationController::class, 'show'])->name('registrations.show');
        Route::patch('registrations/{registration}/status',    [AdminRegistrationController::class, 'updateStatus'])->name('registrations.updateStatus');
        Route::delete('registrations/{registration}',          [AdminRegistrationController::class, 'destroy'])->name('registrations.destroy');

        // Settings
        Route::get('settings',  [SettingController::class, 'index'])->name('settings.index');
        Route::post('settings', [SettingController::class, 'update'])->name('settings.update');
    });
});
