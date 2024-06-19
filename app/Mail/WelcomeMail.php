<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;
    public $rank;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $qlr;
    /**
     * Create a new message instance.
     * @param  string  $rank
     * @param  string  $first_name
     * @param  string  $middle_name
     * @param  string  $last_name
     * @param  string  $qlr
     * @return void
     * 
     */
    public function __construct($rank, $first_name, $middle_name, $last_name, $qlr)
    {
        $this->rank = $rank;
        $this->first_name = $first_name;
        $this->middle_name = $middle_name;
        $this->last_name = $last_name;
        $this->qlr = $qlr;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
    return $this->from('dlospro2clearance@gmail.com')
    ->subject('Successfull Application')
    ->view('emails.welcome')
    ->with([
        'rank' => $this->rank,
        'first_name' => $this->first_name,
        'middle_name' => $this->middle_name,
        'last_name' => $this->last_name,
        'qlr' => $this->qlr,
    ]);
    }
}
