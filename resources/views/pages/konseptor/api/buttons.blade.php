<div class="text-right">
    <div class="btn-group" role="group">
        <button id="btnGroupDrop1" type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-edit"></i> Aksi Tersedia
        </button>
        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
            
            <a class="dropdown-item" onclick="window.pkehendak.open({{$data->id}},'{{$data->nomor}}')" href="#">Pernyataan Kehendak</a>
            <a class="dropdown-item" onclick="window.myMoU.open({{$data->id}},'{{$data->nomor}}')" href="#">Nota Kesepakatan</a>
            <a class="dropdown-item" href="#">Perjanjian Kerjasama</a>
       
        </div>
    </div>
</div>