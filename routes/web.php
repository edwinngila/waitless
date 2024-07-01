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

Route::get('/', function () {
    return view('welcome');
});



Route::group(['middleware' => ['web','auth','verified']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Auth::routes(['verify' => true, 'register' => true]);



Route::resource('admin/users', App\Http\Controllers\Admin\UserController::class)
    ->names([
        'index' => 'admin.users.index',
        'store' => 'admin.users.store',
        'show' => 'admin.users.show',
        'update' => 'admin.users.update',
        'destroy' => 'admin.users.destroy',
        'create' => 'admin.users.create',
        'edit' => 'admin.users.edit'
    ]);
Route::resource('admin/services', App\Http\Controllers\Admin\ServiceController::class)
    ->names([
        'index' => 'admin.services.index',
        'store' => 'admin.services.store',
        'show' => 'admin.services.show',
        'update' => 'admin.services.update',
        'destroy' => 'admin.services.destroy',
        'create' => 'admin.services.create',
        'edit' => 'admin.services.edit'
    ]);
Route::resource('admin/tickets', App\Http\Controllers\Admin\TicketController::class)
    ->names([
        'index' => 'admin.tickets.index',
        'store' => 'admin.tickets.store',
        'show' => 'admin.tickets.show',
        'update' => 'admin.tickets.update',
        'destroy' => 'admin.tickets.destroy',
        'create' => 'admin.tickets.create',
        'edit' => 'admin.tickets.edit'
    ]);
Route::resource('admin/transactions', App\Http\Controllers\Admin\TransactionController::class)
    ->names([
        'index' => 'admin.transactions.index',
        'store' => 'admin.transactions.store',
        'show' => 'admin.transactions.show',
        'update' => 'admin.transactions.update',
        'destroy' => 'admin.transactions.destroy',
        'create' => 'admin.transactions.create',
        'edit' => 'admin.transactions.edit'
    ]);
Route::resource('admin/services', App\Http\Controllers\Admin\servicesController::class)
    ->names([
        'index' => 'admin.services.index',
        'store' => 'admin.services.store',
        'show' => 'admin.services.show',
        'update' => 'admin.services.update',
        'destroy' => 'admin.services.destroy',
        'create' => 'admin.services.create',
        'edit' => 'admin.services.edit'
    ]);
Route::resource('admin/tickets', App\Http\Controllers\Admin\TicketsController::class)
    ->names([
        'index' => 'admin.tickets.index',
        'store' => 'admin.tickets.store',
        'show' => 'admin.tickets.show',
        'update' => 'admin.tickets.update',
        'destroy' => 'admin.tickets.destroy',
        'create' => 'admin.tickets.create',
        'edit' => 'admin.tickets.edit'
    ]);

// Route::get('/text-to-speech', App\Http\Controllers\TextToSpeechController::class)
//     ->names([
//         'generateSpeech'=> 'admin.tickets.index',
//     ]);

