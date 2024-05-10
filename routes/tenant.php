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

    Route::get('/indigency', [TenantController::class, 'TenantIndigency'])->name('app.indigency');

    Route::get('/residence', [TenantController::class, 'TenantResidence'])->name('app.residence');

    Route::get('/clearance', [TenantController::class, 'TenantClearance'])->name('app.clearance');


    Route::get('/pdf', [ PdfController::class, 'index' ])->name('pdf.download');



    // this is the route only secretary can accesss!
    Route::group(['middleware' => ['role:secretary']], function () {
        
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

    
require __DIR__.'/tenant-auth.php';
    
});
