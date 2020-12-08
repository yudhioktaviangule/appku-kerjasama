<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;
use App\Notifications\BerkasDibuatNotification;
use App\Mail\BerkasDibuatMail;
use Mail;
class BerkasDibuat implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $u;
    public function __construct($u)
    {
        $this->u=$u;
    }

    public function handle()
    {
        $user = $this->u['_user'];
        $email = new BerkasDibuatMail($this->u);
        Mail::to($user->email)->send($email);
    }
}
