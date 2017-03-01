<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Request as Req;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;
use Dompdf\Options;
class PDFController extends Controller{
    public function __construct()
    {
        $this->middleware('web');
    }
    public function index()
    {
        return view('pdf');
    }
    public function preview(Request $request){
        $input = $request->all();
        $title = $input['html-file-name'];
        $folder_name = strtolower(str_replace(' ', '-', $title));
        $html = '';
        $html_editor = '';
        foreach( $input['pages'] as $page=>$content ) {
            $html .= $content;
        }
        foreach( $input['editor'] as $editor=>$editor_content ) {
            $html_editor .= $editor_content;
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
                if(!file_exists(public_path() ."/templates/".$folder_name."/images/")){
                    mkdir(public_path() ."/templates/".$folder_name."/images/",0777,true);
                }
                $file_name = uniqid();
                $file =  public_path() ."/templates/".$folder_name."/images/".$file_name . $extension;
                $success = file_put_contents($file, $data);
                if($success > 0){
                    $src =  url()->to('/')."/templates/".$folder_name."/images/".$file_name.$extension;
                }
                $tag->setAttribute('src', $src);
            }
        }
        $html =  $doc->saveHTML();
        file_put_contents( public_path() ."/templates/".$folder_name."/".$folder_name . '.html', $html);
        file_put_contents( public_path() ."/templates/".$folder_name."/".$folder_name . '-edit.html', $html_editor);
        $html_id = DB::table('templates')->insertGetId(['title' => $title,
            'html_file' => $folder_name, 'pdf_file' => '',
            'visitor' => $request->ip(), 'created_at' => date('Y-m-d H:i:s')]);
        
        $templates = DB::table('templates')
            ->select('templates.*')
            ->where('templates.visitor', $request->ip())
            ->whereRaw('templates.html_file != "" ')
            ->orderBy('templates.title', 'asc')
            ->get();
        return view('template',['templates' => $templates]);
//        $options = new Options();
//        $options->set('defaultFont', 'Courier');
//        $options->set('isRemoteEnabled', FALSE);
//        $options->set('isHtml5ParserEnabled', TRUE);
//        //$options->set('chroot', '');
//        $dompdf = new Dompdf($options);
//        
//        $dompdf->loadHtml($html);
//
//
//        // (Optional) Setup the paper size and orientation
//        $dompdf->setPaper('A4','landscape');
//
//        // Render the HTML as PDF
//        $dompdf->render();
//
//        // Output the generated PDF to Browser
//        $dompdf->stream();

    }
    
    public function templates() {
        $templates = DB::table('templates')
            ->select('templates.*')
            ->where('templates.visitor', Req::ip())
            ->whereRaw('templates.html_file != "" ')
            ->orderBy('templates.title', 'asc')
            ->get();
        return view('templates',['template' => $templates]);
    }
}
