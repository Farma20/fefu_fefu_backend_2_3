<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\NewsController;
use \App\Http\Controllers\AppealController;
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

//Маршрут для обработки страницы со списком новостей
Route::get('/news', [NewsController::class, 'getList'])->name('news_list');

//маршрут для обратботки страницы с отдельной новостью
Route::get('/news/{slug}', [NewsController::class, 'getDetails'])->name('news_item');

//маршрут для обработки и отправки данных введенных пользователем

Route::get('/appeal', [AppealController::class, 'create'])->name('appeal');

Route::post('/appeal/save', [AppealController::class, 'save'])->name('save_appeal');

