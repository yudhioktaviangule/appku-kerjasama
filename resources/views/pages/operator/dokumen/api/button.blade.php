<div class="text-right">
    <div class="btn-group" role="group">
        <button id="btnGroupDrop1" type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Aksi Tersedia
        </button>
        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
            @if($data->status==='0')
                <a class="dropdown-item" href="#" onclick="window.nomorDoc.openModals({{$data->id}})">Buat Nomor</a>
            @elseif($data->status==='1')
                <a class="dropdown-item" href="#" onclick="window.teruskanKasubag.openModals({{$data->id}})">Teruskan Ke Kasubag</a>
            @endif;
        </div>
    </div>
</div>