@extends("layouts.main")
@section("title",'Dokumen')
@section("crumb")
    <!-- <li class="breadcrumb-item">Clients</li> -->
    <li class="breadcrumb-item active">Registrasi Dokumen</li>
@endsection
@section("content")
<div class="container-fluid">
    <div class="row">
    
        <div class="col-12">
            
            <div class="card">
                <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3 class='card-title'>
                        Dokumenku
                    </h3>
                    <a href="#" onclick='window.dashboardClient.addModal()'>
                        Registrasi Dokumen
                    </a>
                  
                  
                </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id='table-walikota'>
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
@endsection

@section("js")
        <script>
            $(document).ready(()=>{
                window.myUrl = {
                    table:"{{route('walikota-api.index')}}",
                    store:"{{route('pejabat.store')}}",
                    delete:"{{route('pejabat.destroy',['pejabat'=>'@pejabat@'])}}",
                }
                window.walikota = window.APP.walikota;
                walikota.init();
            });
        </script>
@endsection