<div class="card ">
	<div class="card-header simelonecolor">
		<h3 class="card-title">Pihak Kedua</h3>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse">
				<i class="fas fa-minus"></i>
			</button>
		</div>
	</div>
	
	<div class="card-body p-0">
		<div class="container-fluid">
            <!-- inputan yang dikirim ke server -->
            <input type="hidden" id='pihak-kedua' name='pihak_kedua'>
            <!-- card hak -->  <br>
                <div class="form-group">
                    @include("pages.dokumen.pihak2.hak")
                </div>
            <!-- end card hak -->  
            
            <!-- card kewajiban -->
            <div class="form-group">
                    @include("pages.dokumen.pihak2.kewajiban")
                </div>
            <!-- batas card kewajiban -->
        </div>
	</div>
</div>