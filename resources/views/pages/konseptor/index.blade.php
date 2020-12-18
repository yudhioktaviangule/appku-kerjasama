@extends("layouts.main")
@section("title",'Konseptor')
@section("crumb")
    <!-- <li class="breadcrumb-item">Clients</li> -->
    <li class="breadcrumb-item active">Konseptor</li>
@endsection
@section("content")
    <div class="col-12">
        <form class="card" method="post">
            <auth></auth>
            <input type="hidden" name='document_id'>
            <input type="hidden" name='judul' id='jdl'>
            <div class="card-header">
                <h3 class="card-title">
                    <strong id="title-atas">Daftar Dokumen</strong><br>
                    <small id="deskripsi">
                        Daftar Dokumen yang statusnya <strong>Siap ditanda tangani</strong>
                    </small>
                </h3>
                <div class="card-tools">
                    <button onclick='window.konseptor.onBackPress()' id='bt-back' type="button" 
                    class="btn btn-default ">
                        <i class="fas fa-chevron-left"></i>
                        Kembali
                    </button>
                    <button id='bt-arsip' class="btn  btn-primary">
                        <i class="fas fa-archive"></i>
                        Arsipkan
                    </button>
                </div>
         
            </div>
            
            <div class="card-body" >
                <div class="container-fluid">
                    <div class="table-responsive" id='table-wrapper'>
                        <table class="table table-bordered" id="table-dokumen">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Instansi</th>
                                    <th>Tentang</th>
                                    <th>Dinas Tujuan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
    
                    </div>

                    <div id="document-wrapper" class="col-12">
                        <textarea name="isi" id="isi" cols="30" rows="10" class="form-control" placeholder="Template Isi Arsip"></textarea>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
@section("js")
    <script>
        $(document).ready(()=>{
            window.myUrl = {
                dokumen:{
                    lengkap:"{{route('cekdok.show',['cekdok'=>'_cekdok_'])}}",
                },
                table:{
                    dt:"{{ route('apikonseptor.index') }}",
                }

            }
            window.konseptor  = window.APP.konseptor;
            konseptor.init();

            window.pkehendak = konseptor.kehendak;
            window.myMoU = konseptor.mou

        });


    </script>
@endsection