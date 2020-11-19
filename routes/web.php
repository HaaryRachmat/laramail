<?php

use App\Http\Livewire\AdminEmployee;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Employees;
use App\Http\Livewire\Journalists;
use App\Http\Livewire\Mails;
use App\Http\Livewire\Medias;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/user/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Untuk Admin
// Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->get('/admin/dashboard', function () {
//     return view('admin.dashboard');
// })->name('admin.dashboard');

Route::group(['middleware' => ['auth:sanctum', 'verified', 'authadmin']], function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');


    Route::get('admin-employee', AdminEmployee::class)->name('admin-employee');
});

Route::group(['midlleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('employee', Employees::class)->name('employee');
    Route::get('surat', Mails::class)->name('surat');
    Route::get('media', Medias::class)->name('media');
    Route::get('jurnalis', Journalists::class)->name('jurnalis');
});
