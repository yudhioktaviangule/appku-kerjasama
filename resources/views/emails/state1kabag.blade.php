@php
    $doc = $data['dokumen'];
    $user = $data['_user'];
@endphp
@component("mail::message")
<h3>Hi, {{$user->name
        }}</h3>

<p> 
    Dokumen dengan nomor <strong>{{$doc->nomor}}</strong>, Tentang <strong>{{$doc->tentang}}</strong>. Telah di acc oleh admin
</p>
    @component('mail::button', ['url' => url('/home'), 'color' => 'success'])
    Ke Aplikasi
    @endcomponent
@endcomponent

