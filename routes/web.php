<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AdminTicketController;
use App\Http\Controllers\AdminUserController;
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
//--------------start of Login Routs------------------
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store'])->name('login.store');
//--------------End of Login Routs------------------


//---------------start of Notifications routs------------
Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
Route::get('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');
//---------------End of Notifications routs------------
//---------------Start of tickets -------------------------------
Route::resource('tickets', TicketController::class)->middleware('auth');
//---------------End of tickets -------------------------------
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/tickets', [AdminTicketController::class, 'index'])->name('admin.tickets.index');
});
//////////////
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::delete('/users/{id}', [AdminUserController::class, 'delete'])->name('admin.users.delete');
    Route::post('/users/{id}/notify', [AdminUserController::class, 'sendNotification'])
        ->name('admin.users.notify');
    Route::get('/users/export-pdf', [AdminUserController::class, 'exportPDF'])
        ->name('admin.users.exportPDF');
});



