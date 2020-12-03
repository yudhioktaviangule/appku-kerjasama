<div class="text-right">
    <a title='lihat sk jabatan' href="{{config('app.portal_port','3000')}}{{$json->file_sk_jabatan}}" target="_blank" class="btn btn-sm bg-purple">
        <i class="fas fa-eye"></i>
        
    </a>
    @if($json->file_sk_jabatan=='sk_jabatan/')
        <a href="#" onclick="window.pJawab.openUploadForm('{{$jsonStr}}')" title="Upload SK Jabatan" class="btn btn-info btn-sm"><i class="fas fa-upload"></i></a>
    @endif
    <a href="#" onclick="window.pJawab.delete('{{$jsonStr}}')" title='Hapus Penanggungjawab {{$json->jabatan}}' class="btn btn-sm btn-danger">
        <i class="fas fa-minus"></i>

    </a>
</div>