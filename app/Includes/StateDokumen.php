<?php 
namespace App\Includes;
use App\Models\Document;
class StateDokumen {
    public function getStateDoc(Document $doc)
    {
        $tindak = $doc->tindakanTerakhir();
        $state = $tindak->stdoc;
        switch ($state) {
            case '0':
                return "Menunggu";
            case '1':
                return "Diterima Admin";
            case '2':
                return "Dikirim Ke Kasubag/Kabag";
            case '3':
                return "Dokumen telah diterima Oleh Kasubag/Kabag";
            case '4':
                return "Disposisi Ke Bag. Hukum";
            case '5':
                return "Dokumen telah diterima Oleh Bag. Hukum";
            case '6':
                return "Dikirim Kembali ke Kasubag/Kabag";
            case '7':
                return "Dokumen telah diterima Oleh Kasubag/Kabag";
            case '8':
                return "Dokumen siap dirapatkan";
            case '9':
                return "Dokumen siap ditandatangani";
            case '10':
                return "Dokumen selesai";
            
            default:
               return "ditolak";
        }
    }   
    
    public function keterangan(Document $doc)
    {
        $tindak = $doc->tindakanTerakhir();
        $state = $tindak->keterangan;
        return $state;
    }
}