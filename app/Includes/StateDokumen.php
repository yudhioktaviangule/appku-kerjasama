<?php 
namespace App\Includes;
use App\Models\Document;
class StateDokumen {
    public function getStateDoc($state='')
    {
        
        switch ($state) {
            case '0':
                return "Menunggu";
            case '1':
                return "Dokumen Telah diberi nomor";
            case '2':
                return "Diproses Kasubag";
            case '3':
                return "Negosiasi antar pihak ";
            case '4':
                return "Mencapai Kesepakatan";
            case '5':
                return "Disposisi Bag. Hukum";
            case '6':
                return "Siap Dirapatkan";
            case '7':
                return "Siap Ditandatangani";
            case '8':
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