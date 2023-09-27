<?php

namespace App\Console\Commands\Test;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dycms:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '测试使用';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
    }
}
