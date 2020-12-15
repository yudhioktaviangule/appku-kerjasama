

<div class="btn-group" role="group">
    <button id="btnGroupDrop1" type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Aksi Tersedia
    </button>
    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
        
      @if($data->status==='3'||$data->status=='0')
        <a class="dropdown-item" onclick="window.hdank.openModal({{ $data->id }})" href="#">Hak dan Kewajiban</a>
        <a class="dropdown-item" href="#" onclick="window.lingkup.openModal({{ $data->id }})">Ruang Lingkup</a>
      @else
        
        <a class="dropdown-item" href="#" >Aksi Tidak Tersedia</a>
      @endif
    </div>
  </div>