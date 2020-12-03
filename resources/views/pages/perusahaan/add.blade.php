<div class="form-group">
    <label for="nama_perusahaan">Nama Perusahaan</label>
    <input type="text" class="form-control" id="nama_perusahaan" name='name'>
</div>

<div class="form-group">
    <label for="exampleInputEmail1">Email Perusahaan</label>
    <input type="email" class="form-control" name='' id="exampleInputEmail1" placeholder="Enter email">
</div>

<div class="form-group">
    <label for="telepon_perusahaan">Telepon Perusahaan</label>
    <input type="text" class="form-control" id="telepon_perusahaan" name='telepon'>
</div>

<div class="form-group">
    <label for="jabatan">Jabatan</label>
    <input type="text" class="form-control" id="jabatan" name='jabatan'>
</div>

<div class="form-group">
    <label for="no_sk_jabatan">No. SK Jabatan</label>
    <input type="text" class="form-control" id="no_sk_jabatan" name='no_sk_jabatan'>
</div>

<div class="form-group">
    <label for="no_sk_jabatan">File SK Jabatan</label>
    <input type="file" class='form-control' onchange="window.dashboardClient.uploader($(this),$('#file_sk_jabatan'))">
    <input type="hidden" id="file_sk_jabatan" name='file_sk_jabatan'>
</div>