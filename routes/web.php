<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Livewire\TravelPolicy\Index;
use App\Livewire\TravelPolicy\Form;
use App\Livewire\TravelPolicy\Show;
use App\Livewire\TravelPolicy\Posted;
use App\Livewire\TravelPolicy\Report;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    // Travel Policy Routes
    Route::get('/travel-policies', Index::class)->name('travel-policy.index');
    Route::get('/travel-policies/create', Form::class)->name('travel-policy.create');
    Route::get('/travel-policies/{policy}/edit', Form::class)->name('travel-policy.edit');
    Route::get('/travel-policies/{policy}', Show::class)->name('travel-policy.show');
    
    // Posted Transactions
    Route::get('/posted-policies', Posted::class)->name('travel-policy.posted');
    
    // Reports
    Route::get('/reports/travel-policies', Report::class)->name('travel-policy.report');
});

require __DIR__.'/auth.php';
