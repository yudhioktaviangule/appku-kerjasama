<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class KirimKabagMail extends Mailable
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
        return $this->markdown('emails.state1pengirim',['data'=>$data])->subject("Berkas Telah Dikirim ke Kepala Bagian")->from("no-reply.pemkot-mks@gmail.com");
    }
}
