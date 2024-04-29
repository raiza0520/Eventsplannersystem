<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/storage_link', function (){ Artisan::call('storage:link'); });

Route::get('/', App\Livewire\Public\Index::class)->name('home');
Route::get('about-us', App\Livewire\Public\AboutUs::class)->name('about-us');
Route::get('services', App\Livewire\Public\Services::class)->name('services');
Route::get('services/{service_id}/packages', App\Livewire\Public\Packages::class)->name('packages');
Route::get('portfolio', App\Livewire\Public\Portfolio::class)->name('portfolio');

Route::get('account/{tab}', App\Livewire\Public\Account::class)->middleware('auth')->name('account');

Route::get('login', App\Livewire\Public\Login::class)->name('login');
Route::post('logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');
Route::get('register', App\Livewire\Public\Register::class)->name('register');
Route::get('forgot-password', App\Livewire\Public\ForgotPassword::class)->name('forgot-password');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('dashboard', App\Livewire\Admin\Dashboard\Index::class)->name('dashboard');
    Route::get('transactions', App\Livewire\Admin\Transaction\Index::class)->name('transactions');
    Route::get('transactions/manage/{transaction}', App\Livewire\Admin\Transaction\Manage::class)->name('transactions.manage');
    Route::get('services', App\Livewire\Admin\Service\Index::class)->name('services');
    Route::get('packages', App\Livewire\Admin\Package\Index::class)->name('packages');
    Route::get('gallery', App\Livewire\Admin\Gallery\Index::class)->name('gallery');
    Route::get('banks', App\Livewire\Admin\Bank\Index::class)->name('banks');
    Route::get('item-types', App\Livewire\Admin\ItemType\Index::class)->name('item-types');
});
