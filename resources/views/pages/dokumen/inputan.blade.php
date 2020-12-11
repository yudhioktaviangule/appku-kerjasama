

<div class="card ">
	<div class="card-header simelonecolor">
		<h3 class="card-title">Informasi Dokumen</h3>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse">
				<i class="fas fa-minus"></i>
			</button>
		</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body p-0">
        <div class="container-fluid">
            <br>
            <div class="card">
                <div class="card-header simelonecolor">
                    <h3 class="card-title">Info Umum</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
				            <i class="fas fa-minus"></i>
			            </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="tentang">Tentang</label>
                            <input required onchange="window.register.validasi()" name="tentang" id="tentang" type='text' class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Pejabat Tujuan</label>
                            <select name="pejabat_id" id="slc" class="select2 form-control"></select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header simelonecolor">
                    <h3 class="card-title">Maksud dan Tujuan</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
				            <i class="fas fa-minus"></i>
			            </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="maksud">Maksud</label>
                            <textarea required onchange="window.register.validasi()" name="maksud" id="maksud"  class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="tujuan">Tujuan</label>
                            <textarea onchange="window.register.validasi()" required name="tujuan" id="tujuan"  class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header simelonecolor">
                    <h3 class="card-title">Pelaksanaan dan Ketentuan Umum</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
				            <i class="fas fa-minus"></i>
			            </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="pelaksanaan">Pelaksanaan</label>
                            <textarea onchange="window.register.validasi()" required name="pelaksanaan" id="pelaksanaan"  class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="ketentuan_umum">Ketentuan Umum</label>
                            <textarea onchange="window.register.validasi()" required name="ketentuan_umum" id="ketentuan_umum"  class="form-control"></textarea>
                        </div>

                    </div>
                </div>
        </div>
    </div>
</div>