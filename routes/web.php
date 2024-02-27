<?php

use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OfficialController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\TeacherController;

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
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/logout', [AdminController::class, 'Logout'])->name('logout');

// Route::get('/profile', [AdminController::class, 'Profile'])->name('profile');                        save s

// Route::post('/profile/store', [AdminController::class, 'ProfileStore'])->name('profile.store');      save



// Temporary for the CRUDS lang
Route::get('/student', [StudentController::class, 'StudentPage'])->name('student');
Route::get('/student/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');
Route::put('/student/{id}', [StudentController::class, 'update'])->name('student.update');
Route::delete('/student/{id}', [StudentController::class, 'destroy'])->name('student.destroy');
Route::get('/grade', [GradeController::class, 'GradePage'])->name('grade');
Route::get('/teacher', [TeacherController::class, 'TeacherPage'])->name('teacher');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('tenants', TenantController::class);
   

    
    
});
Route::get('auth/google', [GoogleAuthController::class, 'redirect' ])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callBackGoogle']);

require __DIR__.'/auth.php';


//******NOT USED******//
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




