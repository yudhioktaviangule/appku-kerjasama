@extends("layouts.main")
@section("title",'Dokumen')
@section("crumb")
    <!-- <li class="breadcrumb-item">Clients</li> -->
    <li class="breadcrumb-item active">Dokumen</li>
@endsection
@section("content")
<div class="col-5" id="mcontent">
            <div class="card" id='mcontent-card'>
                <div class="card-header">
                    <h3 class="card-title"  >
                        <span id='role-pr' style='width:50%;text-overflow:ellipsis'>
                            <strong >Role</strong>
                        </span>
                    </h3>
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
                                        <select onchange='dokumen.role.chain($(this).val())' class='form-control' id="cb-perusahaan">

                                        </select>

                                    </div>
                                </div>
                                
                            </div>
                            <div class="col">
                               
                                    <div id="chain-child">
    
                                    </div>
                               
                            </div>    
                            <div class="col">
                                <div class="form-group">
                                        <a href="#" class='btn btn-info btn-block' onclick='window.dokumen.role.set($("#penanggung-jawab"))' id='btn-cari'>Gunakan Role</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>    

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Dokumen</h3>
                <div class="card-tools">
                        <button onclick='window.dokumen.setModal()' type="button" class="btn btn-sm btn-primary">
                            Register
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="table-dokumen">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Perusahaan</th>
                            <th>Tentang</th>
                            <th>Dinas Tujuan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
@section("js")
    <script>
        $(document).ready(()=>{
            window.myUrl = {
                getPerusahaan:"{{ route('role_user.show',['role_user'=>'@id']) }}",
                getChain:"{{ route('role_user.edit',['role_user'=>'@id']) }}",
                dokumen:{
                    create:"{{ route('doc-api.create') }}?pjid={{ Auth::id() }}",
                    store:"{{ route('dokumen.store') }}",
                }

            }
            window.client = window.APP.Client;
            //console.log(client);
            window.dokumen = window.client.init({{ Auth::id() }}).documents;

        });


    </script>
@endsection