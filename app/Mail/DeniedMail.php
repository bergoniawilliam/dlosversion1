<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DeniedMail extends Mailable
{
    use Queueable, SerializesModels;
    public $rank;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $qlr;
    public $reason;
    /**
     * Create a new message instance.
     * @param  string  $rank
     * @param  string  $first_name
     * @param  string  $middle_name
     * @param  string  $last_name
     * @param  string  $qlr
     * @param  string  $reason
     * @return void
     * 
     */
    public function __construct($rank, $first_name, $middle_name, $last_name, $qlr, $reason)
    {
        $this->rank = $rank;
        $this->first_name = $first_name;
        $this->middle_name = $middle_name;
        $this->last_name = $last_name;
        $this->qlr = $qlr;
        $this->reason = $reason;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
    return $this->from('dlospro2clearance@gmail.com')
    ->subject('Denied Application')
    ->view('emails.denied')
    ->with([
        'rank' => $this->rank,
        'first_name' => $this->first_name,
        'middle_name' => $this->middle_name,
        'last_name' => $this->last_name,
        'qlr' => $this->qlr,
        'reason' => $this->reason,
    ]);
    }
}
