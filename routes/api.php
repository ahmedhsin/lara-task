<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
/***********************Start ROUTES FOR AUTH******************************/

/*this route only use for development to hash a password */
Route::get('hash/{password}', [\App\Http\Controllers\Auth\AuthBaseController::class, 'hash']);

Route::prefix('auth')->group(function (){
   Route::post('login', [\App\Http\Controllers\Auth\AuthApiController::class, 'store']);
   Route::post('logout', [\App\Http\Controllers\Auth\AuthApiController::class, 'destroy']);
});

/***********************END ROUTES FOR AUTH******************************/


/************************Start of Tickets************************/
Route::resource('tickets', \App\Http\Controllers\Ticket\TicketApiController::class)
    ->only(['index', 'create', 'store', 'show'])
    ->names([
        'index' => 'api.tickets.index',
        'create' => 'api.tickets.create',
        'store' => 'api.tickets.store',
        'show' => 'api.tickets.show',
    ]);
/************************End of Tickets************************/

/************************Start of Comments************************/
Route::post('comments', [\App\Http\Controllers\Comment\CommentApiController::class, 'store']);
/************************End of Comments************************/


/************************Start of Users************************/
Route::resource('users', \App\Http\Controllers\User\UserApiController::class)
    ->only(['index', 'destroy'])
    ->names([
        'index' => 'api.users.index',
        'destroy' => 'api.users.destroy',
    ]);

Route::get('users/download/{id}', [\App\Http\Controllers\User\UserBaseController::class, 'download']);

/************************End of Comments************************/

/************************Start Of Notif**********************/
Route::resource('notifications', \App\Http\Controllers\Notification\NotificationApiController::class)
    ->only(['index', 'create', 'store'])
    ->names([
        'index' => 'api.notifications.index',
        'create' => 'api.notifications.create',
        'store' => 'api.notifications.store'
    ]);
Route::post('notifications/read', [\App\Http\Controllers\Notification\NotificationApiController::class, 'read']);
/************************end Of Notif**********************/
