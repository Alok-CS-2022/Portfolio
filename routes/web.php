<?php
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ResearchController;
use App\Http\Controllers\Admin\PovController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('projects', ProjectController::class);
    Route::resource('experiences', ExperienceController::class);
    Route::resource('research', ResearchController::class);
    Route::resource('povs', PovController::class);
    Route::get('settings', [SettingsController::class, 'edit'])->name('settings.edit');
    Route::put('settings', [SettingsController::class, 'update'])->name('settings.update');
    Route::get('messages', [ContactController::class, 'index'])->name('messages.index');
});
require __DIR__.'/auth.php';



