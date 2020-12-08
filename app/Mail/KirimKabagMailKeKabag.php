<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class KirimKabagMailKeKabag extends Mailable
{
    use Queueable, SerializesModels;

    private $content;
    public function __construct($content)
    {
        $this->content=$content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data= $this->content;
        return $this->markdown('emails.state1kabag',['data'=>$data])->subject("Berkas telah dibuat")->from("no-reply.pemkot-mks@gmail.com");
    }
}
