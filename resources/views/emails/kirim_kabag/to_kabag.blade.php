@component("mail::message")
    <p>
        Kepada Yth, Bapak/ibu {{$data->kasubag->name}}  
    </p>
    <p style='text-indent:1em'>
        Dokumen dengan Nomor {{$data->dokumen->nomor}} tentang {{$data->dokumen->tentang}} telah dikirimkan kepada anda. Silahkan masuk ke Aplikasi Untuk meneruskan ke Bagian Hukum
    </p>
    <p>

    </p>
    @component('mail::button', ['url' => url('/home'), 'color' => 'success'])
    Ke Aplikasi
    @endcomponent
@endcomponent