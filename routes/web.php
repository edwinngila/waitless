<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\TextToSpeechController;
use Spatie\Permission\Middlewares\RoleMiddleware;

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


Route::get('/kiosks', function () {
    return view('kiosk.kiosks');
});
Route::get('/kioskWithdraw/{id}/{serviceName}', function ($id,$serviceName) {
    return view('kiosk.kioskWithdraw', ['id' => $id,'serviceName' => $serviceName]);
})->name('kioskWithdraw');

Route::get('/selections', [App\Http\Controllers\Auth\selections::class, 'SaveSelection'])->name('selections');
Route::post('/logoutuser', [App\Http\Controllers\LogoutController::class, 'logout'])->name('logoutuser');
Route::post('/updateSelection/{id}', [App\Http\Controllers\Auth\selections::class, 'UpdateUser'])->name('UpdateUser');
Route::get('/kiosks', [App\Http\Controllers\Auth\selections::class, 'CustomerSelection'])->name('services');

Route::group(['middleware' => ['web','auth','verified']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Auth::routes(['verify' => true, 'register' => true]);

Route::group(['role' => ['role:admin']],function () {

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

    Route::resource('admin/roles', App\Http\Controllers\Admin\RolesController::class)
    ->names([
        'index' => 'admin.roles.index',
        'store' => 'admin.roles.store',
        'show' => 'admin.roles.show',
        'update' => 'admin.roles.update',
        'destroy' => 'admin.roles.destroy',
        'create' => 'admin.roles.create',
        'edit' => 'admin.roles.edit'
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

    Route::resource('admin/service_points', App\Http\Controllers\Admin\ServicePointController::class)
    ->names([
        'index' => 'admin.servicePoints.index',
        'store' => 'admin.servicePoints.store',
        'show' => 'admin.servicePoints.show',
        'update' => 'admin.servicePoints.update',
        'destroy' => 'admin.servicePoints.destroy',
        'create' => 'admin.servicePoints.create',
        'edit' => 'admin.servicePoints.edit'
    ]);
});

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

Route::resource('admin/teller', App\Http\Controllers\Admin\TicketsController::class)
    ->names([
        'index' => 'teller.index',
    ]);


// Route::get('/text-to-speech/{text}', [TextToSpeechController::class, 'generateSpeech'])->name('text-to-speech');

Route::get('/sendbasicemail',[MailController::class,'basic_email']);
Route::get('/sendhtmlemail',[MailController::class,'html_email']);
Route::get('/sendattachmentemail',[MailController::class,'attachment_email']);

