<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StateSatu extends Mailable
{
    use Queueable, SerializesModels;

    private $param;
    public function __construct($data)
    {
        $this->param  = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.kirim_kabag.to_kabag',[ 'data' => $this->param])->subject("Data Registrasi Dokumen");
    }
}
