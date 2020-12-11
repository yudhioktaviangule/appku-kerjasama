@component("mail::message")
    <h4>Hi,{{$data->user->name}}</h4>
    <p>
        Saya Telah mengirim 1 dokumen tentang <strong>{{$data->dokumen->tentang}}</strong> dari <strong>{{$data->dari->jabatan->jabatan}} {{$data->dari->perusahaan->name}}</strong> Untuk menindak lanjuti dokumen ini, silahkan masuk ke aplikasi untuk melanjutkan tindakan pada dokumen ini
    </p>
    <p>
        Salam Hangat, {{$data->dari->user->name}}
    </p>
    @component('mail::button', ['url' => url('/home'), 'color' => 'success'])
    Ke Aplikasi
    @endcomponent
@endcomponent