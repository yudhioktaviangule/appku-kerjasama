
@if($data->status==='4')
<a id='btn-terusan' href="{{route('ksbhdankweb.show',['ksbhdankweb'=>$data->id])}}"  class="btn btn-success">
                    <i class="fas fa-share"></i>&nbsp;Teruskan Ke Bag. Hukum
</a>
@endif
@if($data->status==='5')
    <a id='btn-balik-kasubag' href="{{route('hkmdocweb.show',['hkmdocweb'=>$data->id])}}"  class="btn btn-success">
        <i class="fas fa-share"></i>&nbsp;Teruskan Ke Kasubag
    </a>
    
@endif
@if($data->status==='6')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Agenda Rapat</h3>
                </div>
                <div class='card-body'>
                    <div id="agenda-wrapper"></div>
                </div>
                <div class="card-footer">
                    
                    <button onclick="window.agenda.save()" class="btn btn-info" type='button'>Buat Agenda</button>
                </div>
            </div>

        </div>
        <div class="col"></div>

    </div>
    <a id='btn-agenda' href="#" onclick="window.agenda.createAgenda({{$data->id}})"  class="btn btn-success">
        <i class="fas fa-calendar"></i>&nbsp;Buat Agenda Rapat
    </a>
@endif
@if($data->status==='7')
    <a id='btn-agenda' href="{{route('ttd.show',['ttd'=>$data->id])}}"  class="btn btn-success">
                        <i class="fas fa-fingerprint"></i>&nbsp;Siap ditanda tangani
    </a>
@endif
@if($data->status==='8')
    <a id='btn-agenda' href="{{route('selesai.show',['selesai'=>$data->id])}}"  class="btn btn-success">
        <i class="fas fa-check"></i>&nbsp;Selesaikan Proses 
    </a>
@endif