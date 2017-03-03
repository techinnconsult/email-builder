<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request as Req;

class MakePdf extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'html:pdf {filename} {--1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Convert HTML to PDF from following path storage/html/';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $options = new Options();
        $options->set('defaultFont', 'Courier');
        $options->set('isRemoteEnabled', TRUE);
        $options->set('isHtml5ParserEnabled', TRUE);
        $path = storage_path();
        $options->set('chroot', $path.'/html/');
        //$options->set('chroot', '');
        $filename = $this->argument('filename');
        $dompdf = new Dompdf($options);
        $thelist = '';
        if(!file_exists($path."/export/")){
            mkdir($path."/export/",0755);
        }
        if($filename == 1){
            if ($handle = opendir($path.'/html/')) {
                while (false !== ($file = readdir($handle)))
                {
                    if ($file != "." && $file != ".." && strtolower(substr($file, strrpos($file, '.') + 1)) == 'html')
                    {
                        $dompdf->loadHtmlFile($path.'/html/'.$file);


                        // (Optional) Setup the paper size and orientation
                        $dompdf->setPaper('A4','landscape');

                        // Render the HTML as PDF
                        $dompdf->render();
                        $filename = uniqid();
                        $file_to_save = $path."/export/". $filename .".pdf";
                        $output = $dompdf->output();  
                        if(file_put_contents($file_to_save, $output)){
                            $html_id = DB::table('pdf_log')->insertGetId(['pdf_file_name' => $filename,
                                    'html_file_path' => $path.'/html/'.$file,'pdf_file_path' => $path."/export/". $filename .".pdf" ,
                                    'visitor' => Req::ip(), 'created_at' => date('Y-m-d H:i:s')]);
                        }
                        
                    }
                }
                closedir($handle);
            }
        }else{
            $dompdf->loadHtmlFile($path.'/html/'.$this->argument('filename').'.html');


            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A4','landscape');

            // Render the HTML as PDF
            $dompdf->render();
            $filename - uniqid();
            $file_to_save = $path."/export/".$filename.".pdf";
            $output = $dompdf->output();  
            if(file_put_contents($file_to_save, $output)){
                $html_id = DB::table('pdf_log')->insertGetId(['pdf_file_name' => $filename,
                        'html_file_path' => $path.'/html/'.$this->argument('filename').".html",'pdf_file_path' => $path."/export/". $filename .".pdf" ,
                        'visitor' => Req::ip(), 'created_at' => date('Y-m-d H:i:s')]);
            }
        }
//        
        echo 'Please see pdf on following path /storage/export/';
    }
}
