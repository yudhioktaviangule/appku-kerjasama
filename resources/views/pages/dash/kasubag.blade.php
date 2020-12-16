@extends("layouts.main")
@section("title",'Beranda')
@section("crumb")
    <!-- <li class="breadcrumb-item">Clients</li> -->
    <li class="breadcrumb-item active">Beranda</li>
@endsection
@section("content")
<div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="info-box bg-red">
                <span class="info-box-icon"><i class="fas fa-file"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Ditolak</span>
                    <span class="info-box-number" id='dokumen-ditolak'>0</span>
                    <!-- The progress section is optional -->
                    <div class="progress">
                    <div class="progress-bar" style="width: 70%"></div>
                    </div>
                    <span class="progress-description">
                    Data Dokumen Ditolak
                    </span>
                </div>
                <!-- /.info-box-content -->
                </div>
        
            </div>
            <div class="col">
                <div class="info-box bg-purple">
                <span class="info-box-icon"><i class="fas fa-file"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Diterima</span>
                    <span class="info-box-number" id='dokumen-diterima'>0</span>
                    <!-- The progress section is optional -->
                    <div class="progress">
                    <div class="progress-bar" style="width: 70%"></div>
                    </div>
                    <span class="progress-description">
                    Dokumen Diterima admin
                    </span>
                </div>
                <!-- /.info-box-content -->
                </div>            
            </div>
            <div class="col">
                <div class="info-box bg-green">
                <span class="info-box-icon"><i class="fas fa-file"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Diproses</span>
                    <span class="info-box-number" id='dokumen-diterima'>0</span>
                    
                    <div class="progress">
                    <div class="progress-bar" style="width: 70%"></div>
                    </div>
                    <span class="progress-description">
                    Dokumen Diproses
                    </span>
                </div>
                <!-- /.info-box-content -->
                </div>             
            </div>
            
            <div class="col">
                <div class="info-box bg-primary">
                <span class="info-box-icon"><i class="fas fa-file"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Selesai</span>
                    <span class="info-box-number" id='dokumen-diterima'>0</span>
                    <!-- The progress section is optional -->
                    <div class="progress">
                    <div class="progress-bar" style="width: 70%"></div>
                    </div>
                    <span class="progress-description">
                    Dokumen Selesai
                    </span>
                </div>
                <!-- /.info-box-content -->
                </div>             
            </div>
            
            

        </div>
        <div class="row">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">

                        <h3 class='card-title'>Daftar Dokumen</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id='table-kasubag'>
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Instansi</th>
                                    <th>Tentang</th>
                                    <th>Tujuan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
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
                dash:{
                    dataTable:`{{ route('ksbdoc.index') }}`,
                },
                negosiasi:{
                    "create":`{{ route('ksbnego.create') }}?doc=_DOC_`,
                    "store":`{{ route('ksbnego.store') }}?doc=_DOC_`,
                },
            };
            window.kasubag = window.APP.kasubag;
            window.kasubag.init({{Auth::id()}});
            window.dt      = kasubag.dataTable; 
            window.nego    = kasubag.nego;
            window.dt.init({{ Auth::id() }})

        });
    </script>
@endsection