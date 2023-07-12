<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;
use App\Mail\DailyStock;
use App\Models\Actualstock;
use DB;

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
        $stockData='';
        //$stockData = Actualstock::WhereNotNull('deleted_at')->get();
        $stockData = DB::table('actualstocks')->join('skus','actualstocks.product_sku_id','=','skus.id')->where('actualstocks.actual_stock','<=',10000)->get();
  
        if($stockData->count() > 0) {
            foreach ($stockData as $stockdata) {
               Mail::to('ankita@firsteconomy.com')->send(new DailyStock($stockdata));
            }
        }
  
        return 0;
    }
}
