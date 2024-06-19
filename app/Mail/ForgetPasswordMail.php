<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ForgetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $token;
    public $user_name;
 /**
         * Create a new message instance.
         * @param  string  $token
         * @param  string  $user_name
         *
         * @return void
         * 
         */
    public function __construct($token, $user_name)
    {
        $this->token = $token;
        $this->user_name = $user_name;
    }
    
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
{
    return $this->from('dlospro2clearance@gmail.com')
                ->subject('Reset Password')
                ->view('emails.forget-password');
}
}

