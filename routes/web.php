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
    return view('home');
});


/*********************Start of auth routes**************************/

Route::prefix('auth')->group(function (){
    Route::get('/login', [\App\Http\Controllers\Auth\AuthWebController::class, 'create'])->name('web.login.create');
    Route::post('/login', [\App\Http\Controllers\Auth\AuthWebController::class, 'store'])->name('web.login.store');
    Route::post('/logout', [\App\Http\Controllers\Auth\AuthWebController::class, 'destroy'])->name('web.logout');
});

/*********************End of auth routes**************************/

/*********************Start of Tickets*****************************/
Route::resource('tickets', \App\Http\Controllers\Ticket\TicketWebController::class)
    ->only(['index', 'create', 'store', 'show'])
    ->names([
    'index' => 'web.tickets.index',
    'create' => 'web.tickets.create',
    'store' => 'web.tickets.store',
    'show' => 'web.tickets.show',
]);

/*********************End of Tickets*****************************/

/************************Start of Comments************************/
Route::post('comments', [\App\Http\Controllers\Comment\CommentWebController::class, 'store']);
/************************End of Comments************************/

/************************Start of Users************************/
Route::resource('users', \App\Http\Controllers\User\UserWebController::class)
    ->only(['index', 'destroy'])
    ->names([
        'index' => 'web.users.index',
        'destroy' => 'web.users.destroy',
    ]);
/************************End of Comments************************/
