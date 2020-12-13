@component("mail::message")
    <h4>Hi,{{$data->dari->user->name}}</h4>
    <p>
        Maaf dokumen anda kami tolak karena tidak melengkapi syarat-syarat registrasi dokumen kami.
    </p>
    <p>
        Salam Hangat, <strong>SIM-PAT</strong>
    </p>
    @component('mail::button', ['url' => url('/home'), 'color' => 'success'])
    Ke Aplikasi
    @endcomponent
@endcomponent