<p>No. {{$data->nomor_akta_notaris}}</p>
<div class="form-group">
    <label for="file">File</label>
    <input required id='file' type="file" onchange="window.dashboardClient.uploader($(this),$('#file_akta'))">
    <input type="hidden" name='file_akta' id='file_akta' value=''>
</div>