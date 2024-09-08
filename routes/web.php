<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PointageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VAcances;
use App\Http\Controllers\VcancesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/index',function(){
return view('layouts.index');
})->middleware(['auth', 'verified'])->name('index');
Route::get('/employees',[EmployeeController::class,'index'])->middleware(['auth', 'verified'])->name('employees.index');
Route::get('/employees/create',[EmployeeController::class,'create'])->middleware(['auth', 'verified'])->name('employees.create');
Route::post('/ajouter/employees',[EmployeeController::class,'store'])->middleware(['auth', 'verified'])->name('employees.store');
Route::get('edit/{id}/employess',[EmployeeController::class,'edit'])->middleware(['auth', 'verified'])->name('employees.edit');
Route::delete('delete/{id}/employees',[EmployeeController::class,'destroy'])->middleware(['auth', 'verified'])->name('employees.destroy');
Route::put('update/{id}/employyes',[EmployeeController::class,'update'])->middleware(['auth', 'verified'])->name('employees.update');

Route::get('/pointage',[PointageController::class,'index'])->middleware(['auth', 'verified'])->name('pointages.index');
Route::get('/pointage/create',[PointageController::class,'create'])->middleware(['auth', 'verified'])->name('pointages.create');
Route::post('/pointage/store',[PointageController::class,'store'])->middleware(['auth', 'verified'])->name('pointage.store');
Route::delete('/pointage/{id}/delete',[PointageController::class,'destroy'])->middleware(['auth', 'verified'])->name('pointage.destroy');
Route::get('/pointages',[PointageController::class,'createe'])->middleware(['auth', 'verified'])->name('pointages.pointage');
Route::get('/pointages/{data}',[PointageController::class,'show'])->middleware(['auth', 'verified'])->name('pointages.show');


Route::post('/pointage/storee',[PointageController::class,'storee'])->middleware(['auth', 'verified'])->name('pointage.storee');

Route::get('/employees/search', [EmployeeController::class, 'search'])->name('employees.search');
Route::get('/pointage/search', [PointageController::class, 'search'])->name('pointages.search');


Route::get('/admin',[AdminController::class,'index'])->name('Admin.index');
Route::delete('/admin/{id}/delete',[AdminController::class,'destroy'])->middleware(['auth', 'verified'])->name('admin.destroy');

Route::get('/Vacances/home', [VcancesController::class, 'index'])->name('countdown.home');
Route::post('/countdown/store', [VcancesController::class, 'store'])->name('countdown.store');
Route::delete('/vacances/{id}/delete',[VcancesController::class,'destroy'])->middleware(['auth', 'verified'])->name('vacances.destroy');

Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->middleware(['auth', 'verified'])->name('admin.edit');
Route::put('/admin/update/{id}', [AdminController::class, 'update'])->middleware(['auth', 'verified'])->name('admin.update');



Route::middleware('auth','verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/editt', [ProfileController::class, 'editt'])->name('profile.editt');

    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profilee/edit', [ProfileController::class, 'updatee'])->name('profile.updatee');

    Route::delete('/employees/{cin}', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
