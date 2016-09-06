<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App;
use Symfony\Component\Process\Process;
use Symfony\Component\Exception\ProcessFailedException;

class AssetsPublish extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'assets:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish any project assets to the public html folder';

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
        if (App::environment('local')) 
        {
            $this->error("Error: This command is not intended for local use.");
            return false;
        }

        if (App::environment('staging')) 
        {
            // remove current assets from public folder
            $this->run_command('rm -rf /home/adrianbav/public_html/staging.bavanco.co.uk/build/');
            $this->run_command('rm -rf /home/adrianbav/public_html/staging.bavanco.co.uk/images/');
            
            // copy new assets to public folder
            $this->run_command('cp -r public/build /home/adrianbav/public_html/staging.bavanco.co.uk/');
            $this->run_command('cp -r public/images /home/adrianbav/public_html/staging.bavanco.co.uk/');
        }

        $this->info("Successfully published assets.");
    }


    // Private functions

    /**
     * Run a command.
     *
     * @return void
     */
    private function run_command($cmd) 
    {        
        // Run the command
        $process = new Process($cmd);
        $process->run();

        // Check for any errors
        if ( ! $process->isSuccessful()) 
        {
            $this->error("This command was unsuccessful.");
            return false;
        }       

        return true;
    }

}
