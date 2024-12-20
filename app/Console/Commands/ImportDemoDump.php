<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportDemoDump extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:demodump';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports the SQL dump of database/migrations/_demo.sql';

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

        $msg = 'Command: Dumping DEMO!';

        \DB::statement('SET FOREIGN_KEY_CHECKS=0');
        \DB::unprepared(file_get_contents('database/migrations/_demo.sql'));
        \DB::statement('SET FOREIGN_KEY_CHECKS=1');

        \Log::channel('slack')->info($msg);

        error_log($msg);

    }
}
