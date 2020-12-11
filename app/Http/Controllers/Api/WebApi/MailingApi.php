<?php

namespace App\Http\Controllers\Api\WebApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\StateNol;
use App\Includes\Mailer;
use App\Models\Document;
use App\Models\User;

class MailingApi extends Controller{
    private $request;
    use Mailer;
    public function __construct(Request $request){
        $this->request = $request; 
        $this->middleware('auth.api');
    }

    public function berkasDibuat($document_id='')
    {
        $data=Document::where("id",$document_id)->first();
        $user = User::where("level",'operator')->get();
        foreach ($user as $key => $value) {
            $data = [
                'dokumen' => $data->toArray(),
                'tujuan'  => $data->getPejabat()->toArray(),
                'dari'    => [
                    'jabatan'    => $data->getPenanggungJawab()->toArray(),
                    'perusahaan' => $data->getPenanggungJawab()->getPerusahaan()->toArray(),
                    'user'       => $data->getPenanggungJawab()->getPerusahaan()->getUser()->toArray(),
                ],
                'user' =>$value->toArray(),  
            ];
            $object= json_decode(json_encode($data));
            $content = new StateNol($object);
            $this->mailService($value,$content);
        }
    }
    public function kirimkasubag($document_id='')
    {
        
    }
    
}
