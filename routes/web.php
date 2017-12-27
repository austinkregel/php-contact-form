<?php

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

Auth::routes();

// Disable registration page
Route::get('register', function () {
    abort(404);
});

Route::post('register', function () {
    abort(404);
});


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/force-login', function () {
    $user = App\User::first();
    
    if (empty($user)) {
        $user = factory(App\User::class)->create();
    }
    
    auth()->login($user);
    
    return redirect(route('home'));
});