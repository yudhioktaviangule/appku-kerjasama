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
use App\Mail\KirimKabagMail;
use App\Mail\KirimKabagMailKeKabag;
use App\Models\User;
use Mail;
class BerkasKirimKabag implements ShouldQueue
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
        $user = $this->u['dokumen']->getPenanggungJawab()->getPerusahaan()->getUser();
        $email = new KirimKabagMail($this->u);
        Mail::to($user->email)->send($email);
        $kasubag = User::where("level",'kasubag')->get();
        foreach ($kasubag as $key => $value) {
            $user = $value;
            $u = ['dokumen'=>$this->u['dokumen'],'_user'=>$value];
            $email = new KirimKabagMailKeKabag($u);
            Mail::to($user->email)->send($email);
        }

    }
}
