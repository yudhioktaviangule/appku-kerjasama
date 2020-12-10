@extends("layouts.main")
@section("title",'Arsip')
@section("crumb")
    <!-- <li class="breadcrumb-item">Clients</li> -->
    <li class="breadcrumb-item active">Arsip</li>
@endsection
@section("content")
<form action="{{route('arsip.store')}}" method='POST' id='form-arsip' style='width:100%'>
    <div class="container-fluid">
        <auth></auth>
        <input type="hidden" name='judul'>
        <input type="hidden" name='document_id'>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3 class='card-title'>
                            <strong id='p-title'>Pilih Dokumen</strong><br>
                            <small id='sub-title'>Pilih dokumen untuk dibuatkan Arsip</small>
                        </h3>
                        <div class="text-right" id='kirim'>
                            <a href="#" onclick="window.arsip.init()" class="btn bg-maroon">Batal</a>
                            <a href="#" onclick="window.arsip.submitForm()" class="btn bg-lightblue" >Kirim</a>

                        </div>
                    </div>
                    </div>
                    <div class="card-body" id='body-content'>

                    </div>
                </div>
            </div>
    
        </div>
        

    </div>
</form>
@endsection

@section("js")
        <script>
            $(document).ready(()=>{
                window.myUrl = {
                    arsip:{
                        store:`{{route('arsip.store')}}`,
                        dataTable:`{{route('arsipapi.index')}}`
                    },
                    sruce:{
                        get:'{{route("kehendak.get.resource",["document_id"=>"@document@"])}}',
                    }
                }

                window.arsip = window.APP.arsip;
                arsip.init();
                
            });
        </script>
@endsection