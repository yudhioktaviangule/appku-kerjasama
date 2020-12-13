<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class stateTolak extends Mailable
{
    use Queueable, SerializesModels;

    private $param;
    public function __construct($data)
    {
        $this->param  = $data;
    }

    public function build()
    {
        return $this->markdown('emails.tolak.to_user',[ 'data' => $this->param])->subject("Dokumen Ditolak");
    }
}
