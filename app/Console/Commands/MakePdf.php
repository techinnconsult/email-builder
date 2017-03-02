<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Dompdf\Dompdf;
use Dompdf\Options;

class MakePdf extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'html:pdf {filename}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Convert HTML to PDF from following path public/html/';

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
        $path = public_path();
        $options->set('chroot', $path.'/html/');
        //$options->set('chroot', '');
        $dompdf = new Dompdf($options);
        
        $dompdf->loadHtmlFile(public_path().'/html/'.$this->argument('filename').'.html');


        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4','landscape');

        // Render the HTML as PDF
        $dompdf->render();
        
        $file_to_save = $path."/html/".$this->argument('filename').".pdf";
        $output = $dompdf->output();
        file_put_contents($file_to_save, $output);
        echo 'Please see pdf on following path /public/html/'.$this->argument('filename').".pdf";
    }
}
