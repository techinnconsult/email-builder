<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;
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
        $doc = new \DOMDocument();
        $doc->loadHTML($html);
        $tags = $doc->getElementsByTagName('img');
        foreach ($tags as $tag) {
            $old_src = $tag->getAttribute('src');
            $imgdata = base64_decode($old_src);
            $extension = '';
            $data = '';
            $image_type = substr($old_src, 5, strpos($old_src, ';')-5);
            if($image_type == 'image/png'){
                $data = str_replace('data:image/png;base64,', '', $old_src);
                $data = str_replace(' ', '+', $data);
                $data = base64_decode($data);
                $extension = '.png';
            }elseif($image_type == 'image/jpeg'){
                $data = str_replace('data:image/jpeg;base64,', '', $old_src);
                $data = str_replace(' ', '+', $data);
                $data = base64_decode($data);
                $extension = '.jpeg';
            }elseif($image_type == 'image/jpg'){
                $data = str_replace('data:image/jpg;base64,', '', $old_src);
                $data = str_replace(' ', '+', $data);
                $data = base64_decode($data);
                $extension = '.jpg';
            }elseif($image_type == 'image/gif'){
                $data = str_replace('data:image/gif;base64,', '', $old_src);
                $data = str_replace(' ', '+', $data);
                $data = base64_decode($data);
                $extension = '.gif';
            }
            if($extension != ''){
                if(!file_exists(public_path() ."/templates/images/")){
                    mkdir(public_path() ."/templates/images/",0777,true);
                }
                $file_name = uniqid();
                $file =  public_path() ."/templates/images/".$file_name . $extension;
                $success = file_put_contents($file, $data);
                if($success > 0){
                    $src =  url()->to('/')."/templates/images/".$file_name.$extension;
                }
                $tag->setAttribute('src', $src);
            }
        }
        $html =  $doc->saveHTML();
//        echo $html;
//        $file_name = uniqid();
//        file_put_contents( public_path() ."/templates/".$file_name . '.html', $html);
        $options = new Options();
        $options->set('defaultFont', 'Courier');
        $options->set('isRemoteEnabled', TRUE);
        $options->set('isHtml5ParserEnabled', TRUE);
        //$options->set('chroot', '');
        $dompdf = new Dompdf($options);
        
        $dompdf->loadHtml($html);


        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4','landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();

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
            if(!file_exists(public_path() ."/templates/images/")){
                mkdir(public_path() ."/templates/images/",0777,true);
            }
            $file_name = uniqid();
            $file =  public_path() ."/templates/images/".$file_name . $extension;
            $success = file_put_contents($file, $data);
            if($success > 0){
                return url()->to('/')."/templates/images/".$file_name.$extension;
            }else{
                return 2;
            }
        }else{
            return 1;
        }
    }
}
