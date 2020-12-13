<?php

namespace App\Http\Controllers\Api\WebApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\StateNol;
use App\Mail\StateSatu;
use App\Mail\StateSatuToUser;
use App\Mail\stateToHukum;
use App\Mail\stateTolak;
use App\Includes\Mailer;
use App\Models\Document;
use App\Models\User;

class MailingApi extends Controller{
    private $request;
    use Mailer;
    public function __construct(Request $request){
        $this->request = $request; 
      //  $this->middleware('auth.api');
    }

    public function berkasDibuat($document_id='')
    {
        $data = Document::where("id",$document_id)->first();
        $user = User::where("level",'operator')->get();
        foreach ($user as $key => $value) {
            $xdata = [
                'dokumen' => $data->toArray(),
                'tujuan'  => $data->getPejabat()->toArray(),
                'dari'    => [
                    'jabatan'    => $data->getPenanggungJawab()->toArray(),
                    'perusahaan' => $data->getPenanggungJawab()->getPerusahaan()->toArray(),
                    'user'       => $data->getPenanggungJawab()->getPerusahaan()->getUser()->toArray(),
                ],
                'user' =>$value->toArray(),  
            ];
            $object  = json_decode(json_encode($xdata));
            $content = new StateNol($object);
            $this->mailService($value,$content);
        }
    }
    public function kirimkasubag($document_id='',$operator_id='')
    {
        $data     = Document::where("id",$document_id)->first();
        $kasubags = User::where("level",'kasubag')->get();
        $operator = User::where("id",$operator_id)->first();
        if($operator!=NULL):
            foreach ($kasubags as $key => $value) {
                $x = [
                    'operator' => $operator,
                    'dokumen' => $data->toArray(),
                    'tujuan'  => $data->getPejabat()->toArray(),
                    'dari'    => [
                        'jabatan'    => $data->getPenanggungJawab()->toArray(),
                        'perusahaan' => $data->getPenanggungJawab()->getPerusahaan()->toArray(),
                        'user'       => $data->getPenanggungJawab()->getPerusahaan()->getUser()->toArray(),
                    ],
                    'kasubag' => $value
                ];
                $object  = json_decode(json_encode($x));
                $content = new StateSatu($object);
                
                
                $this->mailService($value,$content);
            }

            $x = [
                'dokumen' => $data->toArray(),
                'tujuan'  => $data->getPejabat()->toArray(),
                'dari'    => [
                    'jabatan'    => $data->getPenanggungJawab()->toArray(),
                    'perusahaan' => $data->getPenanggungJawab()->getPerusahaan()->toArray(),
                    'user'       => $data->getPenanggungJawab()->getPerusahaan()->getUser()->toArray(),
                ],
                'operator' => $operator,
            ];
            $object  = json_decode(json_encode($x));
            $client = $object->dari->user;
            $content2 = new StateSatuToUser($object);
            $this->mailService($client,$content2);
            
        endif;
    }

    public function kirimHukum($document_id,$kasubag)
    {
        $users    = User::where("level",'bag. hukum')->get();
        $data     = Document::where("id",$document_id)->first();
        $pengirim = User::where("id",$kasubag)->first(); 
        foreach ($users as $key => $user) {
            $xdata = [
                'dokumen' => $data->toArray(),
                'tujuan'  => $data->getPejabat()->toArray(),
                'dari'    => [
                    'jabatan'    => $data->getPenanggungJawab()->toArray(),
                    'perusahaan' => $data->getPenanggungJawab()->getPerusahaan()->toArray(),
                    'user'       => $data->getPenanggungJawab()->getPerusahaan()->getUser()->toArray(),
                ],
                'penerima' => $user->toArray(),  
                'pengirim' => $pengirim->toArray(),  
            ];
            $object  = json_decode(json_encode($xdata));
            $content = new stateToHukum($object);
            $this->mailService($user,$content);
        }
        
    }
    public function tolak($document_id='')
    {
        
        $data     = Document::where("id",$document_id)->first();
        
       
        $xdata = [
            'dokumen' => $data->toArray(),
            'tujuan'  => $data->getPejabat()->toArray(),
            'dari'    => [
                'jabatan'    => $data->getPenanggungJawab()->toArray(),
                'perusahaan' => $data->getPenanggungJawab()->getPerusahaan()->toArray(),
                'user'       => $data->getPenanggungJawab()->getPerusahaan()->getUser()->toArray(),
            ]
        ];
        $object  = json_decode(json_encode($xdata));
        $content = new stateTolak($object);
        $this->mailService($object->dari->user,$content);
        
    }

    public function kembaliKasubag($document_id='',$kasubag='')
    {
        $users    = User::where("level",'kasubag')->get();
        $data     = Document::where("id",$document_id)->first();
        $pengirim = User::where("id",$kasubag)->first(); 
        foreach ($users as $key => $user) {
            $xdata = [
                'dokumen' => $data->toArray(),
                'tujuan'  => $data->getPejabat()->toArray(),
                'dari'    => [
                    'jabatan'    => $data->getPenanggungJawab()->toArray(),
                    'perusahaan' => $data->getPenanggungJawab()->getPerusahaan()->toArray(),
                    'user'       => $data->getPenanggungJawab()->getPerusahaan()->getUser()->toArray(),
                ],
                'penerima' => $user->toArray(),  
                'pengirim' => $pengirim->toArray(),  
            ];
            $object  = json_decode(json_encode($xdata));
            $content = new stateToHukum($object);
            $this->mailService($user,$content);  
        }      
    }
    
}
