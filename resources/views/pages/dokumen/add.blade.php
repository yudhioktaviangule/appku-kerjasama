<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="container-fluid">
                <div class="form-group">
                    <label for="tentang">Tentang</label>
                    <textarea required name="tentang" id="tentang" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="maksud">Maksud</label>
                    <textarea required name="maksud" id="maksud" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="tujuan">Tujuan</label>
                    <textarea required name="tujuan" id="tujuan" cols="30" rows="5" class="form-control"></textarea>
                </div>
            </div>
            
        </div>
        <div class="col" id='accordion'>
            <div class="card card-lightblue">
                <div class="card-header row justify-content-between">
                    <h4 class="card-title col">
                        Ruang Lingkup <strong><span id='jumlah-lingkup'>0</span> data</strong>
                    </h4>
                    <div class="text-right col" >
                        <strong>
                            <a onclick='window.register.lingkup.capLihat($(this))' href="#collapse-lingkup" data-toggle="collapse">
                            <i class="fas fa-eye"></i> Lihat
                        </a>
                        </strong>
                    </div>
                </div>
                <div id="collapse-lingkup" class="collapse" >
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class='table table-bordered' cellspacing=4 cellpadding=4>
                                <thead>
                                    <tr>
                                        <th>Daftar Ruang Lingkup</th>
                                    </tr>
                                </thead>
                                <tbody id="list-lingkup"></tbody>
                            </table>                                
                        </div>
                        <div class="form-group">
                            <input type="text" autocomplete="off" id='lingkupText' placeholder='Masukkan ruang lingkup' class="form-control"><br>
                            <a href="#" class="btn btn-sm btn-primary"  onclick="window.register.lingkup.add($(`#lingkupText`))">Tambah Ruang Lingkup</a>
                        </div>
                        <input type="hidden" name="lingkup" id='lingkup-json'>
                    </div>
                </div>
            </div>
            <div class="card card-lightblue">
                <div class="card-header row justify-content-between">
                    <h4 class="card-title col">
                       Usulan Hak dan Kewajiban Pihak Pertama 
                    </h4>
                    <div class="text-right col" >
                        <strong>
                            <a onclick='window.register.lingkup.capLihat($(this))' href="#collapse-pihak1" data-toggle="collapse">
                            <i class="fas fa-eye"></i> Lihat
                        </a>
                        </strong>
                    </div>
                </div>                
                <div id="collapse-pihak1" class="collapse" >
                    <div class="container-fluid">
                        <br>
                        <div class="form-group">
                            <input type="hidden" name="pihak_pertama"id='pihak-pertama'>
                            <div class="card card-primary">
                                <div class="card-header row justify-content-between">
                                    <h4 class="card-title col">
                                    Usulan Hak
                                    </h4>
                                    <div class="text-right col" >
                                        <strong>
                                        <a onclick='window.register.lingkup.capLihat($(this))' href="#collapse-hak-pihak1" data-toggle="collapse">
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>
                                        </strong>
                                    </div>
                                </div>
                                <div id="collapse-hak-pihak1"   class="collapse">
                                    <div class="container-fluid">
                                        <div class="form-group">
                                            <table class='table table-bordered' >
                                                <thead>
                                                    <tr>
                                                        <th>Daftar Usulan Hak</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="list-hak-pihak-pertama"></tbody>
                                            </table>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" autocomplete="off" id='hak1' placeholder='Masukkan Usulan Hak pihak pertama' class="form-control"><br>
                                            <a href="#" class="btn btn-sm btn-primary"  onclick="window.register.pihak1.addHak($(`#hak1`))">Tambah Hak</a>
                                            
                                        </div>
                                    </div>
                                </div>                
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="card card-primary">
                                <div class="card-header row justify-content-between">
                                    <h4 class="card-title col">
                                    Usulan Kewajiban
                                    </h4>
                                    <div class="text-right col" >
                                        <strong>
                                        <a onclick='window.register.lingkup.capLihat($(this))' href="#collapse-kewajiban-pihak1" data-toggle="collapse">
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>
                                        </strong>
                                    </div>
                                </div>
                                <div id="collapse-kewajiban-pihak1"   class="collapse">
                                    <div class="container-fluid">
                                        <div class="form-group">
                                            <table class='table table-bordered' >
                                                <thead>
                                                    <tr>
                                                        <th>Daftar Kewajiban</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="list-kewajiban-pihak-pertama"></tbody>
                                            </table>
                                        </div>
                                        <div class="form-group">
                                            
                                            <input type="text" autocomplete="off" id='kewajiban1' placeholder='Masukkan Kewajiban pihak pertama' class="form-control"><br>
                                            <a href="#" class="btn btn-sm btn-primary"  onclick="window.register.pihak1.addKewajiban($(`#kewajiban1`))">Tambah Kewajiban</a>
                                        </div>
                                        
                                    </div>
                                </div>                
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="card card-lightblue">
                <div class="card-header row justify-content-between">
                    <h4 class="card-title col">
                       Usulan Hak dan Kewajiban Pihak Kedua 
                    </h4>
                    <div class="text-right col" >
                        <strong>
                            <a onclick='window.register.lingkup.capLihat($(this))' href="#clps-pihak2" data-toggle="collapse">
                                <i class="fas fa-eye"></i> Lihat
                            </a>
                        </strong>
                    </div>
                    
                </div>
                <div id="clps-pihak2" class='collapse' >
                    <div class="container-fluid">
                        <br>
                        <input type="hidden" id='pihak-kedua' name='pihak_kedua'>
                        <div class="form-group">
                            <div class="card card-primary">
                                <div class="card-header row justify-content-between">
                                    <h4 class="card-title col">
                                        Usulan Hak 
                                    </h4>
                                    <div class="col text-right">
                                        <a onclick='window.register.lingkup.capLihat($(this))' href="#c-hak2" data-toggle="collapse">
                                            <i class="fas fa-eye"></i> Lihat
                                        </a>    
                                    </div>
                                </div>
                                <div class="collapse" id="c-hak2">
                                    <div class="container-fluid">
                                        <br>
                                        <div class="form-group">
                                            <table class="table table-bordered">
                                                <tbody id="hak-p2">
                                                    <tr>
                                                        <td class='text-center'>Belum ada data yang diinputkan</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="text" class="form-control" id='hak2' placeholder="Masukkan hak pihak ke-2"><br>
                                            <a href="#" class="btn btn-sm btn-primary"  onclick="window.register.pihak2.addHak($(`#hak2`))">Tambah Hak</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>                     
                        <div class="form-group">
                            <div class="card card-primary">
                                <div class="card-header row justify-content-between">
                                    <h4 class="card-title col">
                                        Usulan Kewajiban 
                                    </h4>
                                    <div class="col text-right">
                                        <a onclick='window.register.lingkup.capLihat($(this))' href="#c-wajib2" data-toggle="collapse">
                                            <i class="fas fa-eye"></i> Lihat
                                        </a>    
                                    </div>
                                </div>
                                <div class="collapse" id="c-wajib2">
                                    <div class="container-fluid">
                                        <br>
                                        <div class="form-group">
                                            <table class="table table-bordered">
                                                <tbody id="kewajiban-p2">
                                                    <tr>
                                                        <td class='text-center'>Belum ada data yang diinputkan</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="text" class="form-control" id='kewajiban2' placeholder="Masukkan kewajiban pihak ke-2"><br>
                                            <a href="#" class="btn btn-sm btn-primary"  onclick="window.register.pihak2.addKewajiban($(`#kewajiban2`))">Tambah Hak</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>                     
                    </div>
                </div>                
            </div>

           

        </div>
        
    </div>
</div>