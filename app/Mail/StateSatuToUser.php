<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StateSatuToUser extends Mailable
{
    use Queueable, SerializesModels;

    private $param;
    public function __construct($param)
    {
        $this->param=$param;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.kirim_kabag.to_user',['data'=>$this->param])->subject("Dokumen dikirim ke Kasubag");
    }
}
