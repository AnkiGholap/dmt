<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;

class DailyStock extends Mailable
{
    use Queueable, SerializesModels;

    public $stockData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($stockData)
    {
        $this->stockData = $stockData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Stock Data Less than 10000 on '.Carbon::now()->format('d-m-Y'))
                    ->view('admin.emails.stockdata');
    }
}
