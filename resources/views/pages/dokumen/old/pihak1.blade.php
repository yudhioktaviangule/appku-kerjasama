<div class="card ">
	<div class="card-header simelonecolor">
		<h3 class="card-title">Pihak Pertama</h3>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse">
				<i class="fas fa-minus"></i>
			</button>
		</div>
	</div>
	
	<div class="card-body p-0">
		<div class="container-fluid">
            <!-- inputan yang dikirim ke server -->
            <input type="hidden" name="pihak_pertama"id='pihak-pertama'>
            <!-- card hak -->  <br>
                <div class="form-group">
                    @include("pages.dokumen.pihak1.hak")
                </div>
            <!-- end card hak -->  
            
            <!-- card kewajiban -->
            <div class="form-group">
                    @include("pages.dokumen.pihak1.kewajiban")
                </div>
            <!-- batas card kewajiban -->
        </div>
	</div>
</div>