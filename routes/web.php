<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\test_controller;

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

// Route::view('/','dashboard');

Route::get('/', function () {
    return redirect('/LaravelCrud');
});

Route::resource('LaravelCrud', LaravelCrudController::class);

Route::get('/deleted_users','LaravelCrudController@deleted_user_view')->name('deleteduser');

Route::get('deleted_users/restoreuser/{id}', 
        'LaravelCrudController@restoreDeletedUser')
        ->name('restoreDeletedUser');

Route::get('deleted_users/deleteduser/{id}', 
        'LaravelCrudController@permanantDeletedUser')
        ->name('DeltedUser.destroy');

