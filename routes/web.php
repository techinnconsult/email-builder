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

use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
    Route::post('/image/upload', 'HTMLController@uploadImage'); // Delete PDF Template
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
// upload file

Route::post('/upload', function () {
//    print_r();

    if (isset($_FILES['image'])) {
        $errors = array();
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $f = explode('.', $file_name);
        $file_ext = strtolower($f[1]);

        $expensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $expensions) === false) {
            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        }

        if (empty($errors) == true) {
            if(!file_exists(public_path()."/templates/images/")){
                mkdir(public_path()."/templates/images/",0777);
            }
            move_uploaded_file($file_tmp, public_path()."/templates/images/" . $file_name);
            return url('/')."/templates/images/" . $file_name;
        } else {
            return json_encode($error);
        }
    }
//    $file = $request->input('image');
//
//    if($file) {
//
//        $destinationPath = public_path() . '/uploads/';
//        $filename = $file->getClientOriginalName();
//
//        $upload_success = Input::file('image')->move($destinationPath, $filename);
//
//        if ($upload_success) {
//
//            // resizing an uploaded file
//            Image::make($destinationPath . $filename)->resize(100, 100)->save($destinationPath . "100x100_" . $filename);
//
//            return Response::json('success', 200);
//        } else {
//            return Response::json('error', 400);
//        }
//    }
});
Route::get('/home', 'HomeController@index');
