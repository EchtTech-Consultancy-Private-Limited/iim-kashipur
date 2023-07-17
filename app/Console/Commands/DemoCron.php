<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Exports\UsersExport;
use App\Models\audit_log;

class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
        Excel::store(new UsersExport, 'excel-sheet/invoices.xlsx.');
        return back();
    }
}
