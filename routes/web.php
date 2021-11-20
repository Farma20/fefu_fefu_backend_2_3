<?php

use Illuminate\Support\Facades\Route;

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

///////////////////////////////////////////////////1//////////////////////////////////////////

Route::get('/', function () {
    return view('welcome');
});

//Маршрут для обработки страницы со списком новостей
Route::get('/News', [\App\Http\Controllers\NewsController::class, 'getList'])->name('News_list');

//маршрут для обратботки страницы с отдельной новостью
Route::get('/News/{slug}', [\App\Http\Controllers\NewsController::class, 'getDetails'])->name('News_item');

///////////////////////////////////////////////////1//////////////////////////////////////////
