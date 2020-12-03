<?php 

namespace App\Includes;

class PhotoProcessing{
    private $base_64='';
    private $path;
    private $filePath;
    private $kategori;
    private $mime;
    private $filename;

    public function __construct($kategori,$base_64)
    {
        $this->base_64=$base_64;
        $this->kategori=$kategori;
        $this->path = public_path().'/../../PortalFoto/'.$kategori.'/<file>';
       // dd($this->path);
    }
    public function setName($fileName,$fileRegex)
    {
        $this->getMime();
        $this->fileName = $fileName.'.'.$this->mime;
        $regFilter = '/(<file>)/';

        $xfile = preg_replace($regFilter,$fileName,$fileRegex);
        return $xfile;
    }
    public function upload()
    {

        list($type,$base64) = explode(',',$this->base_64);
        
        $this->getMime();
        $pattern = '/<file>/';
        $path = preg_replace($pattern,$this->fileName,$this->path);
        $decode = base64_decode($base64);
        file_put_contents($path, $decode);
    }

    public function getMime()
    {
        $mime = explode('base64,',$this->base_64);
        $mime = $mime[0];
        $mime = explode("/",$mime);
        $mime = $mime[1];
        $mime = explode(";",$mime);
        $mime = $mime[0];
        $this->mime=$mime;
        return $this->mime;
    }
    public function getFilename()
    {
        $mime = $this->getMime();
        $this->filePath= "$this->kategori/<file>.{$mime}";
        return $this->filePath ;
    }
    
}