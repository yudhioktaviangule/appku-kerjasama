@php
    $data = json_decode($json);
@endphp

<div class="text-right">
    
    @if($level==='' && $type==='0')
    <a href="#" class="btn btn-sm btn-success" 
        data-tentang='{{$data->tentang}}' 
        data-maksud='{{$data->maksud}}' 
        data-tujuan='{{$data->tujuan}}' 
        data-lingkup='{{$data->lingkup}}'
        data-pihak_pertama='{{$data->pihak_pertama}}'
        data-pihak_kedua='{{$data->pihak_kedua}}'
        onclick="window.opdashboard.modals.open('Nomor Dokumen','{{$data->id}}','2',$(this))">
        <i class="fas fa-share"></i> 
    </a>
    @elseif($level==='' && $type==='1')
    <a href="#" class="btn btn-sm btn-success" 
        data-nomor='{{$data->nomor}}' 
        data-tentang='{{$data->tentang}}' 
        data-maksud='{{$data->maksud}}' 
        data-tujuan='{{$data->tujuan}}' 
        data-lingkup='{{$data->lingkup}}'
        data-pihak_pertama='{{$data->pihak_pertama}}'
        data-pihak_kedua='{{$data->pihak_kedua}}'
        onclick="window.opdashboard.pejabat.open('Nomor Dokumen','{{$data->id}}','10',$(this))">
        <i class="fas fa-eye"></i> Kirim Ke Kasubag
    </a>
    @elseif($level==='kasubag' && $type=='2')
        <a href="#" class="btn btn-sm btn-info" 
            data-nomor='{{$data->nomor}}' 
            data-tentang='{{$data->tentang}}' 
            data-maksud='{{$data->maksud}}' 
            data-tujuan='{{$data->tujuan}}' 
            data-lingkup='{{$data->lingkup}}'
            data-pihak_pertama='{{$data->pihak_pertama}}'
            data-pihak_kedua='{{$data->pihak_kedua}}'
            onclick="window.opdashboard.modals.open('Nomor Dokumen','{{$data->id}}','4',$(this))">
            <i class="fas fa-user"></i>
        </a>        
        <a href="{{route('kasubag_doc.show',['kasubag_doc'=>$data->id])}}" class='btn btn-danger btn-sm'>
            <i class="fas fa-minus"></i>
        </a>
    
    @elseif(strtolower($level)==='bag. hukum' && $type=='4' )
        <a href="#" class="btn btn-sm btn-info" 
            data-nomor='{{$data->nomor}}' 
            data-tentang='{{$data->tentang}}' 
            data-maksud='{{$data->maksud}}' 
            data-tujuan='{{$data->tujuan}}' 
            data-lingkup='{{$data->lingkup}}'
            data-pihak_pertama='{{$data->pihak_pertama}}'
            data-pihak_kedua='{{$data->pihak_kedua}}'
            onclick="window.opdashboard.modals.open('Nomor Dokumen','{{$data->id}}','6',$(this))">
            <i class="fas fa-handshake"></i>
        </a>        
        
    
    
    @elseif(strtolower($level)==='kasubag' && $type=='6' )
        <a href="#" class="btn btn-sm btn-info" 
            data-nomor='{{$data->nomor}}' 
            data-tentang='{{$data->tentang}}' 
            data-maksud='{{$data->maksud}}' 
            data-tujuan='{{$data->tujuan}}' 
            data-lingkup='{{$data->lingkup}}'
            data-pihak_pertama='{{$data->pihak_pertama}}'
            data-pihak_kedua='{{$data->pihak_kedua}}'
            onclick="window.opdashboard.modals.open('Nomor Dokumen','{{$data->id}}','8',$(this))">
            <i class="fas fa-users"></i>
        </a>        
    
    @elseif(strtolower($level)==='kasubag' && $type=='8' )
        <a href="#" class="btn btn-sm btn-info" 
            data-nomor='{{$data->nomor}}' 
            data-tentang='{{$data->tentang}}' 
            data-maksud='{{$data->maksud}}' 
            data-tujuan='{{$data->tujuan}}' 
            data-lingkup='{{$data->lingkup}}'
            data-pihak_pertama='{{$data->pihak_pertama}}'
            data-pihak_kedua='{{$data->pihak_kedua}}'
            onclick="window.opdashboard.modals.open('Nomor Dokumen','{{$data->id}}','9',$(this))">
            <i class="fas fa-fingerprint"></i>
        </a>        
    @elseif(strtolower($level)==='' && $type=='9' )
        <a href="#" class="btn btn-sm btn-info" 
            data-nomor='{{$data->nomor}}' 
            data-tentang='{{$data->tentang}}' 
            data-maksud='{{$data->maksud}}' 
            data-tujuan='{{$data->tujuan}}' 
            data-lingkup='{{$data->lingkup}}'
            data-pihak_pertama='{{$data->pihak_pertama}}'
            data-pihak_kedua='{{$data->pihak_kedua}}'
            onclick="window.opdashboard.modals.open('Nomor Dokumen','{{$data->id}}','10',$(this))">
            <i class="fas fa-fingerprint"></i>
        </a>        
        
    
    @endif
    
    
</div>