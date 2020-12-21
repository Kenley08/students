<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
class MailAccountCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $pass;

    public function __construct($name,$email,$pass)
    {
        $this->name=$name;
        $this->email=$email;
        $this->pass=$pass;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
    
        $kod=rand(0,1000000); 
        $request->session()->put('kod',$kod);
        return $this->subject('Imel MTS')->markdown('emails.messages.created',compact('kod'));
    }
}
