

<div class="text-right">
    <div class="dropdown">
        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Pilih Aksi
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" >
            <a class="dropdown-item text-primary" href="#" onclick="window.arsip.kehendakClick({id:'{{$id}}',nomor:'{{$nomor}}'})">
                Pernyataan Kehendak
            </a>
            <a class="dropdown-item text-primary" href="#" onclick="window.arsip.notaClick({id:'{{$id}}',nomor:'{{$nomor}}'})">
                Nota Kesepakatan
            </a>
            <a class="dropdown-item text-primary" href="#" onclick="window.arsip.janjiClick({id:'{{$id}}',nomor:'{{$nomor}}'})">
                Perjanjian Kerjasama
            </a>
        </div>
    </div>
</div>