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
    protected $description = 'Convert HTML to PDF from following path storage/templates/';

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
        $path = storage_path();
        if(!file_exists($path."/export/")){
            mkdir($path."/export/",0777);
        }
        $filename = $this->argument('filename');
                        
        if($filename == 1){
            if ($handle = opendir($path.'/templates/')) {
                while (false !== ($file = readdir($handle)))
                {
                    if ($file != "." && $file != ".." && strtolower(substr($file, strrpos($file, '.') + 1)) == 'php')
                    {
                        $html = file_get_contents($path.'/templates/'.$file);
                        
                        $options = new Options();
                        $options->set('defaultFont', 'Courier');
                        $options->set('isRemoteEnabled', TRUE);
                        $options->set('isHtml5ParserEnabled', TRUE);
                        $options->set('chroot', $path.'/templates/');
                        //$options->set('chroot', '');
                        $dompdf = new Dompdf($options);
                        
                        $dompdf->loadHtml($html);


                        // (Optional) Setup the paper size and orientation
                        $dompdf->setPaper('A4','landscape');

                        // Render the HTML as PDF
                        $dompdf->render();
                        $filename = uniqid();
                        $file_to_save = $path."/export/". $filename .".pdf";
                        $output = $dompdf->output();  
                        if(file_put_contents($file_to_save, $output)){
                            $html_id = DB::table('pdf_log')->insertGetId(['pdf_file_name' => $filename,
                                    'html_file_path' => $path.'/templates/'.$file,'pdf_file_path' => $path."/export/". $filename .".pdf" ,
                                    'visitor' => Req::ip(), 'created_at' => date('Y-m-d H:i:s')]);
                        }
                        
                    }
                }
                closedir($handle);
            }
        }else{
            $html = file_get_contents($path.'/templates/'.$this->argument('filename').'.blade.php');           
            $options = new Options();
            $options->set('defaultFont', 'Courier');
            $options->set('isRemoteEnabled', TRUE);
            $options->set('isHtml5ParserEnabled', TRUE);
            $options->set('chroot', $path.'/templates/');
            //$options->set('chroot', '');
            $dompdf = new Dompdf($options);
            $dompdf->loadHtml($html);


            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A4','landscape');

            // Render the HTML as PDF
            $dompdf->render();
            $filename = uniqid();
            $file_to_save = $path."/export/".$filename.".pdf";
            $output = $dompdf->output();  
            if(file_put_contents($file_to_save, $output)){
                $html_id = DB::table('pdf_log')->insertGetId(['pdf_file_name' => $filename,
                        'html_file_path' => $path.'/templates/'.$this->argument('filename').".blase.php",'pdf_file_path' => $path."/export/". $filename .".pdf" ,
                        'visitor' => Req::ip(), 'created_at' => date('Y-m-d H:i:s')]);
            }
        }
//        
        echo 'Please see pdf on following path /storage/export/';
    }
}
