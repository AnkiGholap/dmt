<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;
use App\Mail\DailyStock;
use App\Models\Actualstock;

class salesData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto:stockdata';

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
        $stockdata = Actualstock::where('actual_stock','<=',10000)->orWhereNotNull('deleted_at')->get();
  
        if($stockdata->count() > 0) {
            foreach ($stockdata as $stockData) {
                Mail::to($stockData)->send(new DailyStock($stockData));
            }
        }
  
        return 0;
    }
}
