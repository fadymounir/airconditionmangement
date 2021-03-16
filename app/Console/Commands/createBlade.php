<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Console\Commands\components\pageContent;
use File;
class createBlade extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'createBlade {folderPath}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {

         $view = $this->argument('folderPath');
         $path = $this->viewPath($view);
         $this->createDir($path);

         if (File::exists($path)){
             $this->error("File {$path} already exists!");
             return;
         }

         File::put($path,pageContent::index());





         $this->info("create DataTable Pages  of {$view} successfully by Fady Mounir");
    }


    public function createDir($path){
        $dir = dirname($path);

        if (!file_exists($dir))
        {
            mkdir($dir, 0777, true);
        }
    }

    public function viewPath($view){
        $view = str_replace('.', '/', $view) . '.blade.php';

        $path = "resources/views/{$view}";

        return $path;
    }
}
