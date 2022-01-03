<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShowController;

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
// déclaration de la route qui affichera le formulaire de connexion
Route::get('login', [AuthController::class, 'loginPage']);
Route::post('login', [AuthController::class, 'loginPost'])->name("login");
Route::get('/test', function () {
    return view('test');
})->Middleware('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::resource('shows', ShowController::class);
