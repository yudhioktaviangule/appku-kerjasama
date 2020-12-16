<div class="container-fluid">
    <div class="text-center">
        <strong>
            <p>NO : {{$data->nomor}}</p>
            <p>TENTANG</p>
            <p>{{$data->tentang}}</p>
        </strong>
        <a href="#" class="btn btn-info" onclick="window.teruskanKasubag.save({{$data->id}})">Teruskan ke Kasubag</a>
    </div>
</div>