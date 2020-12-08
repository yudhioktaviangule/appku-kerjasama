@extends("layouts.main")
@section("title",'Dokumen')
@section("crumb")
    <!-- <li class="breadcrumb-item">Clients</li> -->
    <li class="breadcrumb-item active">Registrasi Dokumen</li>
@endsection
@section("content")
<div class="container-fluid">
    <div class="row">
        <div class="col-4" id="mcontent">
            <div class="card" id='mcontent-card'>
                <div class="card-header">
                    <h3 class="card-title" id='role-pr'>Role</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                <div >
                        
                        <div class="col">
                            <div class="col">
                                <div id="pilih-role">
                                    <div class="form-group">
                                        <label for="">Pilih Perusahaan</label>
                                        <select onchange='window.register.chainCombo($(this).val())' class='form-control' id="cb-perusahaan"></select>

                                    </div>
                                </div>
                                
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <div id="chain-child">
    
                                    </div>
                                </div>
                            </div>    
                            <div class="col">
                                <div class="form-group">
                                        <a href="#" class='btn btn-info btn-block' onclick='window.register.setPenanggungJawab()' id='btn-cari'>Gunakan Role</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            
            <div class="card" id='table-walikota'>
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3 class='card-title'>
                            Dokumenku
                        </h3>
                        <a href="#" onclick='window.register.addModal()' class='btn btn-primary' >
                            Registrasi Dokumen
                        </a>
                    
                    
                    </div>
                </div>
                <div class="card-body">
                   
                    <div class="form-group row">

                        <div class="table-responsive">
                            <table class="table table-bordered" id='table-dokumen'>
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Perusahaan</th>
                                        <th>Tentang</th>
                                        <th>Tujuan Kerjasama</th>
                                        <th>
                                            Status Dokumen
                                        </th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                            </table>
    
                        </div>

                    </div>    
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
                    perusahaan:{
                        get:`{{route('client-api-perusahaan.index')}}?uid={{Auth::id()}}&type=true`
                    },
                    pj:{
                        get:`{{route('client-api-penanggungjawabku.show',['client_api_penanggungjawabku'=>'pid-uid'])}}`,
                    },
                    dokumen:{
                        dataTable:"{{route('doc-api.index')}}?pjid=@pjid@",
                        create:"{{route('doc-api.create')}}?pjid=@pjid",
                        store:"{{route('dokumen.store')}}",
                    },
                    pejabat:{
                        select2:"{{route('api.walikota.select2',['slug'=>'_count_-_limit_-_offset_'])}}"
                    }
                }
                register = window.APP.regDokumen;
                register.init('{{Auth::id()}}');
               
            });
        </script>
@endsection