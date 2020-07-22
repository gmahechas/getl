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
/* Macroprojects */
Route::get('macroproject', '\App\Modules\Macroproject\MacroprojectController@index')->name('macroproject.index');
Route::get('macroproject/create', '\App\Modules\Macroproject\MacroprojectController@create')->name('macroproject.create');
Route::post('macroproject', '\App\Modules\Macroproject\MacroprojectController@store')->name('macroproject.store');
Route::get('macroproject/{macroproject}', '\App\Modules\Macroproject\MacroprojectController@show')->name('macroproject.show');
Route::get('macroproject/{macroproject}/edit', '\App\Modules\Macroproject\MacroprojectController@edit')->name('macroproject.edit');
Route::match(['put', 'patch'], 'macroproject/{macroproject}', '\App\Modules\Macroproject\MacroprojectController@update')->name('macroproject.update');
Route::delete('macroproject/{macroproject}', '\App\Modules\Macroproject\MacroprojectController@destroy')->name('macroproject.destroy');

/* Projects */
/* Route::get('project', function () {
    return 'Projects';
})->name('project.index'); */
