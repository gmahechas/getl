<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Macroproject;
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

/* Route::middleware(['auth'])->group(function () { */
    Route::resource('macroproject', '\App\Modules\Macroproject\MacroprojectController');

    Route::resource('project', '\App\Modules\Project\ProjectController')->except(['index', 'show']);
    Route::resource('project', '\App\Modules\Project\ProjectViewController')->only(['index', 'show']);

    Route::resource('chapter', '\App\Modules\Chapter\ChapterController')->except(['index', 'show']);
    Route::resource('chapter', '\App\Modules\Chapter\ChapterViewController')->only(['index', 'show']);
/* }); */

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
