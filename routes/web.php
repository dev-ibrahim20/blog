<?php

use App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Front\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Route as RoutingRoute;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. Tgrese
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();
Route::namespace('Controllers')->group(function () {
  Route::get('/', function () {
    return view('welcome');
  });
  Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::get('/redirect/{service}', [SocialController::class, 'redirect']);
Route::get('/callback/{service}', [SocialController::class, 'callback']);
 