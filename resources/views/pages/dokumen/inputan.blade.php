<div class="container-fluid">
    <div class="form-group">
        <label for="tentang">Tentang</label>
        <input required onchange="window.register.validasi()" name="tentang" id="tentang" type='text' class="form-control">
    </div>
    <div class="form-group">
        <label for="">Pejabat Tujuan</label>
        <select name="pejabat_id" id="slc" class="select2 form-control"></select>
    </div>
    <div class="form-group">
        <label for="maksud">Maksud</label>
        <input required onchange="window.register.validasi()" name="maksud" id="maksud" type='text' class="form-control">
    </div>
    <div class="form-group">
        <label for="tujuan">Tujuan</label>
        <input type='text' onchange="window.register.validasi()" required name="tujuan" id="tujuan"  class="form-control">
    </div>
</div>