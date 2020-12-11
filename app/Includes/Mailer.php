<?php
namespace App\Includes;
use Mail;
trait Mailer {
    public function mailService($param,$email)
    {
        Mail::to($param->email)->send($email);
    }
}