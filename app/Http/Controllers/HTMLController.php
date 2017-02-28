<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
class HTMLController extends Controller{
    public function __construct()
    {
        $this->middleware('web');
    }
    public function preview(Request $request){
        $input = $request->all();
        $html = '';
        foreach( $input['pages'] as $page=>$content ) {
            $html .= $content;
        }
        echo $html;
//        $dompdf = new Dompdf();
//        $dompdf->loadHtml($html);
//
//        // (Optional) Setup the paper size and orientation
//        $dompdf->setPaper('A4', 'landscape');
//
//        // Render the HTML as PDF
//        $dompdf->render();
//
//        // Output the generated PDF to Browser
//        $dompdf->stream();
    }
    
    public function add( Request $request ) {
        $input = $request->all();
        $imgdata = base64_decode($input['image']);
        $extension = '';
        $data = '';
        $image_type = substr($input['image'], 5, strpos($input['image'], ';')-5);
        if($image_type == 'image/png'){
            $data = str_replace('data:image/png;base64,', '', $input['image']);
            $data = str_replace(' ', '+', $data);
            $data = base64_decode($data);
            $extension = '.png';
        }elseif($image_type == 'image/jpeg'){
            $data = str_replace('data:image/jpeg;base64,', '', $input['image']);
            $data = str_replace(' ', '+', $data);
            $data = base64_decode($data);
            $extension = '.jpeg';
        }elseif($image_type == 'image/jpg'){
            $data = str_replace('data:image/jpg;base64,', '', $input['image']);
            $data = str_replace(' ', '+', $data);
            $data = base64_decode($data);
            $extension = '.jpg';
        }elseif($image_type == 'image/gif'){
            $data = str_replace('data:image/gif;base64,', '', $input['image']);
            $data = str_replace(' ', '+', $data);
            $data = base64_decode($data);
            $extension = '.gif';
        }
        if($extension != ''){
            $title = $input['title'];
            if(!file_exists(public_path() ."/templates/$title/images/")){
                mkdir(public_path() ."/templates/$title/images/",0777,true);
            }
            
            $file =  public_path() ."/templates/$title/images/".uniqid() . $extension;
            $success = file_put_contents($file, $data);
            if($success > 0){
                return $file;
            }else{
                return 2;
            }
        }else{
            return 1;
        }
//        $baseFromJavascript = "data:image/png;base64,BBBFBfj42Pj4"; // $_POST['base64']; //your data in base64 'data:image/png....';
//        // We need to remove the "data:image/png;base64,"
//        $base_to_php = explode(',', $baseFromJavascript);
//        // the 2nd item in the base_to_php array contains the content of the image
//        $data = base64_decode($base_to_php[1]);
//        // here you can detect if type is png or jpg if you want
//        $filepath = "/path/to/my-files/image.png"; // or image.jpg
//
//        // Save the image in a defined path
//        file_put_contents($filepath,$data);
    }
}
