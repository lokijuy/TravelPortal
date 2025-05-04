<?php

use App\Livewire\Settings\Profile;
use App\Livewire\Settings\Password;
use App\Livewire\PolicyIssuance\Form;
use App\Livewire\PolicyIssuance\Show;
use App\Livewire\PolicyIssuance\Index;
use App\Livewire\Settings\Appearance;
use App\Livewire\PolicyIssuance\Posted;
use App\Livewire\PolicyIssuance\Report;
use Illuminate\Support\Facades\Route;
use App\Livewire\UserPermissions\EditPermission;
use App\Livewire\UserPermissions\CreatePermission;
use App\Livewire\UserPermissions\EditUser as UserPermissionsEdit;
use App\Livewire\UserPermissions\Index as UserPermissionsIndex;
use App\Livewire\Maintenance\Branches\Index as BranchesIndex;
use App\Livewire\Maintenance\Branches\Form as BranchesForm;
use App\Livewire\Maintenance\Agents\Index as AgentsIndex;
use App\Livewire\Maintenance\Agents\Form as AgentsForm;
use App\Livewire\Maintenance\Packages\Index as PackagesIndex;
use App\Livewire\Maintenance\Packages\Form as PackagesForm;
use App\Livewire\Maintenance\Programs\Index as ProgramsIndex;
use App\Livewire\Maintenance\Programs\Form as ProgramsForm;
use App\Livewire\Maintenance\Products\Index as ProductsIndex;
use App\Livewire\Maintenance\Products\Form as ProductsForm;
use App\Livewire\Maintenance\Coverages\Index as CoveragesIndex;
use App\Livewire\Maintenance\Coverages\Form as CoveragesForm;
use App\Livewire\Maintenance\Branches\Show as BranchesShow;
use App\Livewire\Maintenance\Agents\Show as AgentsShow;
use App\Livewire\Maintenance\Packages\Show as PackagesShow;
use App\Livewire\Maintenance\Programs\Show as ProgramsShow;
use App\Livewire\Maintenance\Products\Show as ProductsShow;
use App\Livewire\Maintenance\Coverages\Show as CoveragesShow;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::prefix('settings')->name('settings.')->group(function () {
        Route::get('profile', Profile::class)->name('profile');
        Route::get('password', Password::class)->name('password');
        Route::get('appearance', Appearance::class)->name('appearance');
    });

    // Policy Routes
    Route::prefix('policy-issuance')->name('policy-issuance.')->group(function () {
        Route::get('/', Index::class)->name('index');
        Route::get('/create', Form::class)->name('create');
        Route::get('/{policy}/edit', Form::class)->name('edit');
        Route::get('/{policy}', Show::class)->name('show');
    });
    
    // Posted Transactions
    Route::get('/posted-policies', Posted::class)
        // ->middleware('permission:view-posted-policies')
        ->name('policy-issuance.posted');
    
    // Reports
    Route::get('/reports/policies', Report::class)
        // ->middleware('permission:view-reports')
        ->name('policy-issuance.report');

    // User Permissions Routes
    Route::prefix('user-permissions')->name('user-permissions.')->group(function () {
        Route::get('/', UserPermissionsIndex::class)->name('index');
        Route::get('/create', CreatePermission::class)->name('create-permission');
        Route::get('/{user}/edit-user', UserPermissionsEdit::class)->name('edit-user');
        Route::get('/{permission}/edit-permission', EditPermission::class)->name('edit-permission');
    });

    // Maintenance Routes
    Route::prefix('maintenance')->name('maintenance.')->group(function () {
        // Branches
        Route::prefix('branches')->name('branches.')->group(function () {
            Route::get('/', BranchesIndex::class)->name('index');
            Route::get('/create', BranchesForm::class)->name('create');
            Route::get('/{branch}/edit', BranchesForm::class)->name('edit');
            Route::get('/{branch}', BranchesShow::class)->name('show');
        });

        // Agents
        Route::prefix('agents')->name('agents.')->group(function () {
            Route::get('/', AgentsIndex::class)->name('index');
            Route::get('/create', AgentsForm::class)->name('create');
            Route::get('/{agent}/edit', AgentsForm::class)->name('edit');
            Route::get('/{agent}', AgentsShow::class)->name('show');
        });

        // Packages
        Route::prefix('packages')->name('packages.')->group(function () {
            Route::get('/', PackagesIndex::class)->name('index');
            Route::get('/create', PackagesForm::class)->name('create');
            Route::get('/{package}/edit', PackagesForm::class)->name('edit');
            Route::get('/{package}', PackagesShow::class)->name('show');
        });

        // Programs
        Route::prefix('programs')->name('programs.')->group(function () {
            Route::get('/', ProgramsIndex::class)->name('index');
            Route::get('/create', ProgramsForm::class)->name('create');
            Route::get('/{program}/edit', ProgramsForm::class)->name('edit');
            Route::get('/{program}', ProgramsShow::class)->name('show');
        });

        // Products
        Route::prefix('products')->name('products.')->group(function () {
            Route::get('/', ProductsIndex::class)->name('index');
            Route::get('/create', ProductsForm::class)->name('create');
            Route::get('/{product}/edit', ProductsForm::class)->name('edit');
            Route::get('/{product}', ProductsShow::class)->name('show');
        });

        //Coverages
        Route::prefix('coverages')->name('coverages.')->group(function () {
            Route::get('/', CoveragesIndex::class)->name('index');
            Route::get('/create', CoveragesForm::class)->name('create');
            Route::get('/{coverage}/edit', CoveragesForm::class)->name('edit');
            Route::get('/{coverage}', CoveragesShow::class)->name('show');
        });
    });
});

require __DIR__.'/auth.php';
