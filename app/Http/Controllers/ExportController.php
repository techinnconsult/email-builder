<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function export($file_name = 1){
        \Artisan::call('html:pdf', [
            'filename' => $file_name, '--1' => 'default'
        ]);
        dd("Done");      
    }
}
