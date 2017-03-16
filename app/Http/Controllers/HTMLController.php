<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Request as Req;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;
use Dompdf\Options;
class HTMLController extends Controller{
    public function __construct()
    {
        $this->middleware('web');
    }
    
    public function functionName($param) {
        
    }
    public function save(Request $request){
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
            }else{
                $old_src = $tag->getAttribute('src');
                $parsed = parse_url($old_src);
                if (empty($parsed['scheme'])) {
                    $tag->setAttribute('src', url()->to('/')."/".$old_src);
                }
            }
        }
        $html =  $doc->saveHTML();
        $resource_path_email = resource_path() ."/views/templates/email/";
        $resource_path_email_edit = storage_path() ."/edit-templates/email/";
        if(!file_exists($resource_path_email)){
            mkdir($resource_path_email,0777,true);
        }
        if(!file_exists($resource_path_email_edit)){
            mkdir($resource_path_email_edit,0777,true);
        }
        if(isset($input['id'])){
            if(file_exists($resource_path_email.$input['html_file'] . '.blade.php')){
                unlink($resource_path_email.$input['html_file'] . '.blade.php');
            }
            if(file_exists($resource_path_email_edit.$input['html_file'] . '.html')){
                unlink($resource_path_email_edit.$input['html_file'] . '.html');
            }
        }
        file_put_contents($resource_path_email.$folder_name . '.blade.php', $html);
        chmod($resource_path_email.$folder_name . '.blade.php', 0777);
        file_put_contents($resource_path_email_edit.$folder_name . '.html', $html_editor);
        chmod($resource_path_email_edit.$folder_name . '.html', 0777);
        if( isset($input['html_file'])){
            $update_folder_name =  $input['html_file'];
            $single_template = DB::table('templates')
                ->select('templates.*')
//                ->where('templates.visitor', $request->ip())
                ->where('templates.id', $input['id'])
                ->whereRaw('templates.html_file != "" ')
                ->orderBy('templates.title', 'asc')
                ->get()->first();
        }else{
            $update_folder_name = $folder_name;
            $single_template = DB::table('templates')
                ->select('templates.*')
//                ->where('templates.visitor', $request->ip())
                ->where('templates.html_file', $update_folder_name)
                ->whereRaw('templates.html_file != "" ')
                ->orderBy('templates.title', 'asc')
                ->get()->first();
        }
        if(count($single_template) == 0 && !isset($input['id'])){
            $html_id = DB::table('templates')->insertGetId(['title' => $title,
                'html_file' => $folder_name, 'pdf_file' => '',
                'visitor' => $request->ip(), 'created_at' => date('Y-m-d H:i:s')]);
        }else{
            DB::table('templates')
            ->where('id', $single_template->id)
            ->update(['title' => "$title",'html_file' => "$folder_name",'updated_at' => date('Y-m-d H:i:s')]);
        }
        return view('templates.email.'.$folder_name);
    }
    
    public function templates() {
        $templates = DB::table('templates')
            ->select('templates.*')
//            ->where('templates.visitor', Req::ip())
            ->whereRaw('templates.html_file != "" ')
            ->orderBy('templates.title', 'asc')
            ->get(); 
        return view('templates',['template' => $templates]);
    }
    
    public function edit($template_title) {
        $templates = DB::table('templates')
            ->select('templates.*')
            ->where('templates.html_file', $template_title)
//            ->where('templates.visitor', Req::ip())
            ->whereRaw('templates.html_file != "" ')
            ->orderBy('templates.title', 'asc')
            ->get()->first();
        $resource_path_email_edit = storage_path() ."/edit-templates/email/";
        $edit_html = file_get_contents($resource_path_email_edit.$template_title . '.html');
        return view('email.edit',['template' => $templates,'edit_html' => $edit_html]);
    }
    
    public function previewHtml($template_id) {
        return view('templates.email.'.$template_id);
    }
    
    public function delete($template_id){
        $single_template = DB::table('templates')
            ->select('templates.*')
//            ->where('templates.visitor', Req::ip())
            ->where('templates.id', $template_id)
            ->whereRaw('templates.html_file != "" ')
            ->orderBy('templates.title', 'asc')
            ->get()->first();
        
        $resource_path_email = resource_path() ."/views/templates/email/";
        $resource_path_email_edit = storage_path() ."/edit-templates/email/";
        if(file_exists($resource_path_email.$single_template->html_file . '.blade.php')){
            unlink($resource_path_email.$single_template->html_file . '.blade.php');
        }
        if(file_exists($resource_path_email_edit.$single_template->html_file . '.html')){
            unlink($resource_path_email_edit.$single_template->html_file . '.html');
        }
        DB::table('templates')->where('id', $template_id)->delete();
        return redirect()->action('HTMLController@templates');
    }
    
    public function uploadImage(Request $request){
        print_r($request);
         return response()->json(['success'=>'done']);
    }
}