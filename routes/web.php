<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Admin\SaveTicket;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\AdminDashController;
use App\Http\Controllers\Admin\editUserProfile;
use App\Http\Controllers\TextToSpeechController;
use App\Http\Controllers\Admin\TicketsController;
use Spatie\Permission\Middlewares\RoleMiddleware;
use App\Http\Controllers\teller\TellerPointController;

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




Route::get('/kiosksLanding', function () {
    return view('kiosk.LandingPage');
});

Route::get('/customerView',[TellerPointController::class, 'getTickets'])->name('customerView');

Route::get('/kiosks', function () {
    return view('kiosk.kiosks');
});

Route::get('/success', function () {
    return view('kiosk.success');
})->name('success');

Route::get('/selections', [App\Http\Controllers\Auth\selections::class, 'SaveSelection'])->name('selections');
Route::post('/logoutuser', [App\Http\Controllers\LogoutController::class, 'logout'])->name('logoutuser');
Route::post('/updateSelection', [App\Http\Controllers\Auth\selections::class, 'UpdateUser'])->name('UpdateUser');
Route::get('/kiosks', [App\Http\Controllers\Auth\selections::class, 'CustomerSelection'])->name('services');
Route::get('/adminDash',[AdminDashController::class,'getInfo'])->name('adminDash');

Route::get('/userProfile',[ App\Http\Controllers\Admin\EditUserProfileController::class,'getProfile'])->name('userProfile');
Route::post('/updateUserProfile',[ App\Http\Controllers\Admin\EditUserProfileController::class,'updateProfile'])->name('updateUserProfile');
Route::post('/updateUserPassword',[ App\Http\Controllers\Admin\EditUserProfileController::class,'updatePassword'])->name('updateUserPassword');

Route::post('/tickets', [App\Http\Controllers\Admin\SaveTicket::class, 'store'])->name('print');

// Route::post('/kioskWithdraw/{id}', [App\Http\Controllers\Admin\TicketsController::class, 'store'])->name('tickets.store');

Route::get('/kioskWithdraw/{id}/{serviceName}', function ($id,$serviceName) {
    return view('kiosk.kioskWithdraw', ['id' => $id,'serviceName' => $serviceName]);
})->name('kioskWithdraw');

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

Route::resource('admin/tickets', App\Http\Controllers\Admin\TicketsController::class)
    ->names([
        'index' => 'admin.tickets.index',
        'show' => 'admin.tickets.show',
        'update' => 'admin.tickets.update',
        'destroy' => 'admin.tickets.destroy',
        'edit' => 'admin.tickets.edit'
    ]);

Route::resource('admin/teller', App\Http\Controllers\teller\TellerPointController::class)
    ->names([
        'index' => 'teller.index',
    ]);


// Route::get('/text-to-speech/{text}', [TextToSpeechController::class, 'generateSpeech'])->name('text-to-speech');

Route::get('/sendbasicemail',[MailController::class,'basic_email']);
Route::get('/sendhtmlemail',[MailController::class,'html_email']);
Route::get('/sendattachmentemail',[MailController::class,'attachment_email']);

Route::post('/complete-ticket', [TellerPointController::class, 'completeTicket'])->name('completeTicket');
Route::post('/clear-ticket', [TellerPointController::class, 'clearTicket'])->name('clearTicket');
Route::post('/next-ticket', [TellerPointController::class, 'nextTicket'])->name('nextTicket');

Route::get('disneyplus', 'DisneyplusController@create')->name('disneyplus.create');
Route::post('disneyplus', 'DisneyplusController@store')->name('disneyplus.store');

