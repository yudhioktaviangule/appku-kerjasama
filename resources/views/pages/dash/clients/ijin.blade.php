<p>No. {{$data->nomor_ijin_usaha}}</p>
<div class="form-group">
    <label for="file">File</label>
    <input required id='file' type="file" onchange="window.dashboardClient.uploader($(this),$('#file_akta'))">
    <input type="hidden" name='file_ijin' id='file_akta' value=''>
</div>