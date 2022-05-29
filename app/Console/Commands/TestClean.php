<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestClean extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:jopa';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Shell command';

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
      shell_exec('php -v');

    }
    //@unlink('/var/www/realedition/telnet.sh');

}
