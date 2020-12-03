<div class="container-fluid">
    <div class="row">
        <div class="col">
    
            <div class="form-group">
                <label for="nama_perusahaan">Nama Perusahaan</label>
                <input type="text" class="form-control" autocomplete=off id="nama_perusahaan" name='name'>
            </div>
    
            <div class="form-group">
                <label for="jenis" >Jenis Badan Usaha</label>
                <select name="jenis" onchange='window.dashboardClient.setInputan($(this))' require id="jenis" class="form-control">
                    <option value=""></option>
                    <option value="Swasta">Swasta</option>
                    <option value="Badan Hukum">Badan Hukum</option>
                    <option value="Antar Daerah">Antar Daerah</option>
                </select>
            </div>
    
            <div class="form-group">
                <label for="exampleInputEmail1">Email Perusahaan</label>
                <input type="email" class="form-control" name='' id="exampleInputEmail1" placeholder="Enter email">
            </div>
    
            <div class="form-group">
                <label for="telepon_perusahaan">Telepon Perusahaan</label>
                <input type="text" class="form-control" id="telepon_perusahaan" name='telepon'>
            </div>
    
        </div>
        <div class="col">
    
            <div class="form-group">
                <label for="no_sk_jabatan">SK Jabatan</label>
                <input type="text" class="form-control" id="jabatan" placeholder='Jabatan' name='jabatan'><br>
                <input type="text" class="form-control" id="no_sk_jabatan" placeholder='Nomor SK. Jabatan' name='no_sk_jabatan'><br>
                <input type='file' placeholder='File ' onchange="window.dashboardClient.uploader($(this),$('#file_sk'))">
                <input type="hidden" id="file_sk" name='file_sk'>
            </div>
            <div id="tergantung-usaha">
              
            </div>

        </div>

    </div>
</div>

