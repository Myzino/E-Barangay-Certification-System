<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

use App\Http\Controllers\App\{
    ProfileController,
    UserController,
    // ResidentController,

};
use App\Http\Controllers\TenantController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\PdfClearanceController;
use App\Http\Controllers\PdfResidencyController;
use App\Http\Controllers\PdfIndigencyController;
use App\Http\Controllers\IndigencyController;
use App\Http\Controllers\ClearanceController;
use App\Http\Controllers\ResidencyController;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
Route::get('/', function () {
    return view('app.welcome');
})->name('app.welcome');



Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [TenantController::class, 'TenantDashboard'])->name('app.dashboard');

    Route::get('/profile', [TenantController::class, 'TenantProfile'])->name('app.profile');

    Route::post('/profile/store', [TenantController::class, 'TenantProfileStore'])->name('app.profile.store');

    Route::get('/plan' , [TenantController::class, 'TenantPlan'])->name('app.plan');

    Route::get('/logout', [TenantController::class, 'TenantLogout'])->name('app.logout');


    Route::get('/pdf', [ PdfController::class, 'index' ])->name('pdf.download');

    Route::get('/pdf-clearance/{clearanceName}', [ PdfClearanceController::class, 'index' ])->name('pdf.clearance');
    Route::get('/pdf-residency/{residencyName}', [ PdfResidencyController::class, 'index' ])->name('pdf.residency');
    Route::get('/pdf-indigency/{indigencyName}', [ PdfIndigencyController::class, 'index'])->name('pdf.indigency');



    // this is the route only secretary can accesss!
    Route::group(['middleware' => ['role:official']], function () {
        
        Route::resource('users', UserController::class);
     });
    
});


// Resident-related routes group
Route::prefix('residents')->middleware(['auth', 'verified'])->group(function () {          //in short this group route is http://127.0.0.1:8000/residents/.. 'automatic residents na siya mag start'
   
    // Route for resident page
    Route::get('/', [ResidentController::class, 'index'])->name('resident.index');

    // Route for resident page
    Route::post('/resident', [ResidentController::class, 'store'])->name('resident.store');

    // Route for updating a student (edit button sa modal)
    Route::put('/resident/{id}', [ResidentController::class, 'update'])->name('resident.update');

    //Route for deleting resident (delete button)
    Route::delete('/resident/{id}', [ResidentController::class, 'destroy'])->name('resident.destroy');

});

// Indigency-related routes group
Route::prefix('indigency')->middleware(['auth', 'verified'])->group(function () {          //in short this group route is http://127.0.0.1:8000/indigency/.. 'automatic residents na siya mag start'
   
    // Route for indigency page
    Route::get('/', [IndigencyController::class, 'index'])->name('indigency.index');

    // Route for indigency page
    Route::post('/indigency', [IndigencyController::class, 'store'])->name('indigency.store');

    // Route for updating a student (edit button sa modal)
    Route::put('/indigency/{id}', [IndigencyController::class, 'update'])->name('indigency.update');

    //Route for deleting indigency (delete button)
    Route::delete('/indigency/{id}', [IndigencyController::class, 'destroy'])->name('indigency.destroy');

});

// Clearance-related routes group
Route::prefix('clearance')->middleware(['auth', 'verified'])->group(function () {          //in short this group route is http://127.0.0.1:8000/clearance/.. 'automatic residents na siya mag start'
   
    // Route for indigency page
    Route::get('/', [ClearanceController::class, 'index'])->name('clearance.index');

    // Route for indigency page
    Route::post('/clearance', [ClearanceController::class, 'store'])->name('clearance.store');

    // Route for updating a student (edit button sa modal)
    Route::put('/clearance/{id}', [ClearanceController::class, 'update'])->name('clearance.update');

    //Route for deleting clearance (delete button)
    Route::delete('/clearance/{id}', [ClearanceController::class, 'destroy'])->name('clearance.destroy');

});

// Residency-related routes group
Route::prefix('residency')->middleware(['auth', 'verified'])->group(function () {          //in short this group route is http://127.0.0.1:8000/residency/.. 'automatic residents na siya mag start'
   
    // Route for residency page
    Route::get('/', [ResidencyController::class, 'index'])->name('residency.index');

    // Route for residency page
    Route::post('/residency', [ResidencyController::class, 'store'])->name('residency.store');

    // Route for updating a student (edit button sa modal)
    Route::put('/residency/{id}', [ResidencyController::class, 'update'])->name('residency.update');

    //Route for deleting residency (delete button)
    Route::delete('/residency/{id}', [ResidencyController::class, 'destroy'])->name('residency.destroy');

});

    
require __DIR__.'/tenant-auth.php';
    
});
