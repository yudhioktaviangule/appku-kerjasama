

<div class="btn-group" role="group">
    <button id="btnGroupDrop1" type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Aksi Tersedia
    </button>
    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
        
      <a class="dropdown-item" onclick="window.hdank.openModal({{ $data->id }})" href="#">Hak dan Kewajiban</a>
      <a class="dropdown-item" href="#">Ruang Lingkup</a>
      @if($data->status==='3')
      <a class="dropdown-item" href="#">Negosiasi</a>
      @endif
    </div>
  </div>