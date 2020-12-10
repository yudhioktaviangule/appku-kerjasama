@extends("layouts.main")
@section("title",'Pejabat')
@section("crumb")
    <!-- <li class="breadcrumb-item">Clients</li> -->
    <li class="breadcrumb-item active">Pejabat</li>
@endsection
@section("content")
<div class="container-fluid">
    <div class="row">
    
        <div class="col-12">
            
            <div class="card">
                <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3 class='card-title'>
                        Daftar Pejabat
                    </h3>
                    <a href="#" onclick='window.walikota.addModal()'>
                        Tambah Pejabat
                    </a>
                  
                  
                </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id='table-walikota'>
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Instansi</th>
                                <th>Jabatan</th>
                                <th>Status Keaktifan</th>
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
@endsection

@section("js")
        <script>
            $(document).ready(()=>{
                window.myUrl = {
                    table:"{{route('walikota-api.index')}}",
                    store:"{{route('pejabat.store')}}",
                    ubah:"{{route('pejabat.update',['pejabat'=>'@pejabat@'])}}",
                    create:"{{route('walikota-api.create')}}",
                    hapus:"{{route('pejabat.destroy',['pejabat'=>'@pejabat@'])}}",
                }
                window.walikota = window.APP.walikota;
                walikota.init();
            });
        </script>
@endsection