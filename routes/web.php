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

    Route::resource('activity', '\App\Modules\Activity\ActivityController')->except(['index', 'show']);
    Route::resource('activity', '\App\Modules\Activity\ActivityViewController')->only(['index', 'show']);

    Route::resource('contract', '\App\Modules\Contract\ContractController')->except(['index', 'show']);
    Route::resource('contract', '\App\Modules\Contract\ContractViewController')->only(['index', 'show']);

    Route::resource('invoice', '\App\Modules\Invoice\InvoiceController')->except(['index', 'show']);
    Route::resource('invoice', '\App\Modules\Invoice\InvoiceViewController')->only(['index', 'show']);

    Route::resource('invoice_status', '\App\Modules\InvoiceStatus\InvoiceStatusController')->except(['index', 'show']);
    Route::resource('invoice_status', '\App\Modules\InvoiceStatus\InvoiceStatusViewController')->only(['index', 'show']);


    Route::get('avg_invoice_status', '\App\Modules\Report\ReportController@avg_invoice_status')->name('avg_invoice_status');
    Route::get('avg_invoice_status_french', '\App\Modules\Report\ReportController@avg_invoice_status_french')->name('avg_invoice_status_french');
    Route::get('count_invoice_status', '\App\Modules\Report\ReportController@count_invoice_status')->name('count_invoice_status');
    Route::get('indicators', '\App\Modules\Indicators\IndicatorsController@index')->name('indicators.index');
    Route::get('indicators_french', '\App\Modules\Indicators\IndicatorsController@index_french')->name('indicators.index_french');
    Route::get('indicators_by_months', '\App\Modules\Indicators\IndicatorsController@index_by_months')->name('indicators_by_months');
    Route::get('indicators_by_months_french', '\App\Modules\Indicators\IndicatorsController@index_by_months_french')->name('indicators_by_months_french');
    Route::get('responsable_report', '\App\Modules\Report\ReportController@index_responsable')->name('responsable_report');
    Route::get('cap_report', '\App\Modules\Report\ReportController@cap_report')->name('cap_report');

    Route::get('/import', '\App\Modules\Import\ImportController@index')->name('import.index');
    Route::post('/import', '\App\Modules\Import\ImportController@store')->name('import.store');
/* }); */

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
