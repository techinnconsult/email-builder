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

Route::group(['middleware' => 'guest'], function () {
    //HTML
    Route::post('/email/save', 'HTMLController@save'); // 
    Route::get('/email/preview/{template_id}', 'HTMLController@previewHtml');
    Route::get('/html/templates', 'HTMLController@templates');
    Route::get('/email/edit/{template_id}', 'HTMLController@edit'); // Show Edit Email Builder
    Route::get('/email/delete/{template_id}', 'HTMLController@delete'); // Delete PDF Template
    
    //PDF
    Route::post('/save', 'PDFController@save'); // Save or update Template
    Route::get('/pdf/', 'PDFController@index'); // PDF Builder
    Route::get('/pdf/preview/{template_title}', 'PDFController@preview');
    Route::get('/pdf/templates', 'PDFController@templatesPdf'); // Show All Templates
    Route::get('/pdf/edit/{template_id}', 'PDFController@edit'); // Show Edit PDF Builder
    Route::get('/pdf/delete/{template_id}', 'PDFController@delete'); // Delete PDF Template
    Route::get('/pdf/download/{template_title}', 'PDFController@download'); // Download PDF Template
    Route::get('/export/{file_name}', 'ExportController@export'); // Download All PDF from templates
});

Route::get('/home', 'HomeController@index');
