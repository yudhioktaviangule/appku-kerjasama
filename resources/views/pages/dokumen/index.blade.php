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
                            <strong >Role:</strong> Belum memilih role
                        </span>
                    </h3>
                    <div class="card-tools">
                        <button type="button" id='collapes-buton' class="btn btn-tool" data-card-widget="collapse">
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
                
                <div class='overlay dark' id='load-role'>
                    <i class="fas fa-2x fa-circle-notch fa-spin"></i>
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
                    dataTable:"{{ route('doc-api.index') }}?uid=@uid",
                    create:"{{ route('doc-api.create') }}?pjid={{ Auth::id() }}",
                    store:"{{ route('dokumen.store') }}",
                },
                dinas:{
                    select2:"{{ route('api.walikota.select2',['slug','slug']) }}"
                },
                hdank:{
                    list:"{{route('hakapi.index')}}?doc=_DOC_",
                    modals:"{{route('hakapi.create')}}?doc=_DOC_",
                    store:"{{route('hakapi.store')}}",
                    delete:"{{route('hakapi.destroy',['hakapi'=>'_HAKAPI_'])}}",
                },
                rlingkup:{
                    modals:"{{route('rlapi.create')}}",
                    list:"{{route('rlapi.index')}}?doc=_DOC_",
                    store:"{{route('rlapi.store')}}",
                    delete:"{{route('rlapi.destroy',['rlapi'=>'_DOC_'])}}",
                }

            }
            window.client  = window.APP.Client;
            
            window.dokumen = window.client.init({{ Auth::id() }}).documents;
            window.hdank   = window.client.hdk;
            window.lingkup = window.client.rLingkup;

        });


    </script>
@endsection