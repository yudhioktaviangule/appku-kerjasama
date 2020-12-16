<div class="container-fluid">
    <div class="form-group">
        <div class="label" for="nomor">Nomor Dokumen</div>
        <input type="text" required class="form-control" name="nomor" id="nomor" autocomplete='off'>
    </div>
    
    <div class="form-group">
        <div class="text-right">
            <a href="#" onclick="window.nomorDoc.save({{$doc->id}})" class="btn btn-sm btn-info">
                Buat Nomor Dokumen
            </a>
        </div>
    </div>
    
</div>