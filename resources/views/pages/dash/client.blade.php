@extends("layouts.main")
@section("title",'Beranda')
@section("crumb")
    <!-- <li class="breadcrumb-item">Clients</li> -->
    <li class="breadcrumb-item active">Beranda</li>
@endsection
@section("content")
@php
    $lev   = Auth::user()->level;
    $preg  = strtolower($lev);
    $image = preg_replace('/(. )/','',$preg);
    
@endphp
<div class="container-fluid">
    <div class="row">
    <div class="col-md-4">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header text-white"
                   style="background:linear-gradient(
          rgba(0, 0, 0, 0.5), 
          rgba(0, 0, 0, 0.5)
        ), url('{{asset('dist/img/photo2.png')}}') center center;">
                <h3 class="widget-user-username text-right"> {{Auth::user()->name}}</h3>
                <h5 class="widget-user-desc text-right"> {{Auth::user()->email}}</h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle" src="{{asset('dist/img/'.$image.'.jpg')}}" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header" id='cnt-perusahaan'>0</h5>
                      <span class="description-text">PERUSAHAAN</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header" id='pjuan-doc'>0</h5>
                      <span class="description-text">PENGAJUAN</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header" id='ditolak-doc'>0</h5>
                      <span class="description-text">DITOLAK</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
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
                        <i class="fas fa-building"></i>
                        Info Perusahaanku
                    </h3>
                    <a href="#" onclick='window.dashboardClient.addModal()'>
                        Tambah Perusahaan
                    </a>
                  
                  
                </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id='table-perusahaan'>
                        <thead>
                            <tr>
                                <th>Perusahaan</th>
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
                count_per:"{{ route('api-perusahaan-c',['id'=>'uid']) }}",
                create:"{{route('client-api-perusahaan.create')}}",
                index:"{{route('client-api-perusahaan.index')}}",
                store:"{{route('perusahaan.store')}}",
                update:"{{route('perusahaan.update',['perusahaan'=>'@per@'])}}",
                delete:"{{route('perusahaan.destroy',['perusahaan'=>'@perusahaan@'])}}",
                uploadNotaris:"{{route('api.perusahaan.upload_doc',['xType'=>'akta','id'=>'@perusahaan@'])}}",
                uploadIjin:"{{route('api.perusahaan.upload_doc',['xType'=>'ijin','id'=>'@perusahaan@'])}}",
                akta:{
                    store:"{{route('akta-notaris.store')}}?pid=@p@"
                },
                ijin:{
                    store:"{{route('ijin.store')}}?pid=@p@"
                },
                tanggungJawab:{
                    dataTable:"{{route('client-api-penanggungjawabku.index')}}",
                    open:"{{route('api.penanggungjawab.view.modal',['pid'=>'@pid@','uid'=>'@uid@'])}}",
                    uploadSK:"{{route('upload.sk.jabatan',['id'=>'@tj_id@'])}}",
                    store:"{{route('client-api-penanggungjawabku.store')}}"
                }
            }
            window.dashboardClient = window.APP.dashboardClient;
            window.dashboardClient.init({{Auth::id()}})
            window.pJawab = window.APP.penanggungJawab;
        });

    </script>
@endsection