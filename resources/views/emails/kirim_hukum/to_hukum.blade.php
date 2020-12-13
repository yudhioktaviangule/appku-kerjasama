@component("mail::message")
    <h5>
        Kepada Yth, Bapak/ibu {{$data->penerima->name}}  
    </h5>
    <p style='text-indent:1em'>
        Dokumen dengan Nomor {{$data->dokumen->nomor}} dari {{$data->dari->perusahaan->name}} tentang {{$data->dokumen->tentang}} telah dikirimkan kepada anda. Silahkan masuk ke Aplikasi Untuk menindak lanjuti dokumen
    </p>
    <p>
        Salam Hangat, <strong>{{$data->pengirim->name}}</strong>
    </p>
    @component('mail::button', ['url' => url('/home'), 'color' => 'success'])
        Ke Aplikasi
    @endcomponent
@endcomponent