<div class="text-right">
    <div class="btn-group" role="group">
        <button id="btnGroupDrop1" type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dokumen
        </button>
        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
            @if($data->status!=='1' && $data->status!=='2')
                <a class="dropdown-item" href="#" onclick="window.nego.openModals({{$data->id}})">Lihat Dokumen</a>
                @if($data->status=='3')
                    <a class="dropdown-item" href="#" onclick="window.teruskanKasubag.openModals({{$data->id}})">Tolak Dokumen</a>
                @endif
            @else
            <a class="dropdown-item" href="#">Tidak ada aksi tersedia</a>
            @endif;
        </div>
    </div>
</div>