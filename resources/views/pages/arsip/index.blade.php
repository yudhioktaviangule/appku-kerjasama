@extends("layouts.main")
@section("title",'Arsip')
@section("crumb")
    <!-- <li class="breadcrumb-item">Clients</li> -->
    <li class="breadcrumb-item active">Arsip</li>
@endsection
@section("content")
<div class="container-fluid">
    <div class="row">
    
        <div class="col-12">
            
            <div class="card">
                <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3 class='card-title'>
                        <strong id='p-title'>Pilih Dokumen</strong><br>
                        <small id='sub-title'>Pilih dokumen untuk dibuatkan Arsip</small>
                    </h3>
                </div>
                </div>
                <div class="card-body" id='body-content'>

                </div>
            </div>
        </div>
 
    </div>
    

</div>
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