<div class="container-fluid">
    <div class="row">
        <div class="col">
    
            <div class="form-group">
                <label for="nama_perusahaan">Nama Perusahaan</label>
                <input required type="text" class="form-control" autocomplete=off id="nama_perusahaan" name='name'>
            </div>
    
            <div class="form-group">
                <label for="jenis" >Jenis Badan Usaha</label>
                <select name="jenis" require id="jenis" class="form-control">
                    <option value=""></option>
                    <option value="Swasta">Swasta</option>
                    <option value="Badan Hukum">Badan Hukum</option>
                    <option value="Antar Daerah">Antar Daerah</option>
                </select>
            </div>
    
            <div class="form-group">
                <label for="exampleInputEmail1">Email Perusahaan</label>
                <input required type="email" class="form-control" name='email' id="exampleInputEmail1" placeholder="Enter email">
            </div>
            <input type="hidden" id='uid' name='user_id' value="{USER_ID}">
        </div>
        <div class="col">
            <div class="form-group">
                <label for="telepon_perusahaan">Telepon Perusahaan</label>
                <input required type="text" class="form-control" id="telepon_perusahaan" name='telepon'>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat Perusahaan</label>
                <textarea name="alamat" id="alamat" cols="30" rows="6" class="form-control"></textarea>
            </div>    
            <div class="form-group">
                <label for="nomor_sk_jabatan">SK Jabatan</label>
                <input required type="text" class="form-control" id="jabatan" placeholder='Jabatan' name='jabatan'><br>
                <input required type="text" class="form-control" id="nomor_sk_jabatan" placeholder='Nomor SK. Jabatan' name='nomor_sk_jabatan'><br>
                
            </div>
            

        </div>

    </div>
</div>

