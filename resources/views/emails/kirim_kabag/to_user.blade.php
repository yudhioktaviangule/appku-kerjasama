@component("mail::message")
    <h4>
        Kepada Yth, Bapak/ibu {{$data->dari->user->name}}  
    </h4>
    <p style='text-indent:1em'>
        Dokumen tentang {{$data->dokumen->tentang}} telah diterima Admin dan diberi No. {{$data->dokumen->nomor}}
    </p>
    <p>
        Salam Hangat, {{$data->operator->name}}        
    </p>
    @component('mail::button', ['url' => url('/home'), 'color' => 'success'])
         Ke Aplikasi
    @endcomponent
@endcomponent