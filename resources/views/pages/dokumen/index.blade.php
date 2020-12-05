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
            <div class="card">
                <div class="card-body">
                <div >
                        <div class="row">
                            <div class="col">
                                <div id="pilih-role">
                                    <div class="container-fluid ">
                                        <div class="form-group">
                                            <label for="">Pilih Perusahaan</label>
                                            <select onchange='window.register.chainCombo($(this).val())' class='form-control' id="cb-perusahaan"></select>
    
                                        </div>
                                        
    
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <div id="chain-child">
    
                                    </div>
                                </div>
                            </div>    
                           
                            
                        </div>
                        <div class="form-group">
                            <div class="container-fluid">
                                
                                <a href="#" class='btn btn-info btn-block' onclick='window.register.setPenanggungJawab()' id='btn-cari'><i class="fas fa-filter"></i> Filter Data</a>
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
                                        <th>Tentang</th>
                                        <th>Keterangan</th>
                                        <th>
                                            <div class="text-right">
                                                Aksi
                                            </div>
                                        </th>
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
                    }
                }
                register = window.APP.regDokumen;
                register.init('{{Auth::id()}}');
               
            });
        </script>
@endsection