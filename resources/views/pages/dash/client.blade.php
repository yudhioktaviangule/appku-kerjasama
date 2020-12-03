@extends("layouts.main")
@section("title",'Beranda')
@section("content")
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-user"></i>
                        Infoku
                    </h3>
                </div>
                <div class="card-body">
                    <table>
                        <tr>
                            <td style='width:50%;padding:.5em;'>Nama</td>
                            <td style='width:50%;padding:.5em;'>: {{Auth::user()->name}}</td>
                        </tr>
                        <tr>
                            <td style='width:50%;padding:.5em;'>Email</td>
                            <td style='width:50%;padding:.5em;'>: {{Auth::user()->email}}</td>
                        </tr>
                        <tr>
                            <td style='width:50%;padding:.5em;'>Telepon</td>
                            <td style='width:50%;padding:.5em;'>: {{Auth::user()->telepon}}</td>
                        </tr>
                        <tr>
                            <td style='width:50%;padding:.5em;'>Nomor Identitas</td>
                            <td style='width:50%;padding:.5em;'>: {{Auth::user()->nomor_identitas}}</td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
        <div class="col-6"></div>
        <div class="col-12">
            
            <div class="card">
                <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3 class='card-title'>
                        Daftar Perusahaanku
                    </h3>
                    <a href="#">
                        
                        Tambah Perusahaan
                    </a>
                  
                  
                </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id='table-perusahaan'>
                        <thead>
                            <tr>
                                <th>Nama Perusahaan</th>
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
    <script >
        $(document).ready(()=>{
            
            window.myUrl = {
                create:"{{route('client-api-perusahaan.create')}}",
            }
            window.dashboardClient = window.APP.dashboardClient;
            window.dashboardClient.init({{Auth::id()}})
        });

    </script>
@endsection