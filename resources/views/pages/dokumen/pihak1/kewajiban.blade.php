<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">Usulan Kewajiban</h3>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse">
				<i class="fas fa-minus"></i>
			</button>
		</div>
	</div>
	
	<div class="card-body p-0">
		<div class="container-fluid">
            <p>Daftar Usulan Kewajiban</p>
            <ul id='list-kewajiban-pihak-pertama' class="products-list product-list-in-card pl-2 pr-2">
			    <li class="item">
                    <span class="product-description text-center">
                        Belum Menambahkan List 
                        
                    </span>
                </li>
		    </ul>
        </div>
    </div>
    <div class="card-footer">
        <div class="input-group">
            <input type="text" autocomplete="off" id='kewajiban1' placeholder='Masukkan Usulan Kewajiban pihak pertama' class="form-control">
            <span class="input-group-append">
                    <a href="#" onclick="window.register.pihak1.addKewajiban($(`#kewajiban1`))" class="btn btn-success" >Tambah Usulan</a>
            </span>
        </div>
    </div>
</div>