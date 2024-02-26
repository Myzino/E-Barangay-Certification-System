<?php

use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OfficialController;

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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('tenants', TenantController::class);
   

    
    
});
Route::get('auth/google', [GoogleAuthController::class, 'redirect' ])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callBackGoogle']);

require __DIR__.'/auth.php';


//Admin Route
//protect route -> user can't access admin
Route::middleware(['auth', 'role:admin'])->group(function() {

    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');

    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    



}); //End Group Admin middleware


// share login page with user for now
// Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');




