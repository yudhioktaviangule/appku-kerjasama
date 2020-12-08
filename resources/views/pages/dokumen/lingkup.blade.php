<div class="card ">
	<div class="card-header simelonecolor">
		<h3 class="card-title">Ruang Lingkup</h3>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse">
				<i class="fas fa-minus"></i>
			</button>
		</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body p-0">
		<ul id='list-lingkup' class="products-list product-list-in-card pl-2 pr-2">
			<li class="item">

				<span class="product-description">
					Belum Menambahkan List 
					
				</span>

			</li>
		</ul>
	</div>
	<!-- /.card-body -->
	<div class="card-footer">
		<div class="input-group">
			<input type="text"   id='lingkupText' placeholder='Masukkan ruang lingkup' class="form-control">
			<input type="hidden" name="lingkup" id="lingkup-json">
			<span class="input-group-append">
				<a href="#" onclick="window.register.lingkup.add($(`#lingkupText`))" class="btn btn-success">Tambah Lingkup</a>
			</span>
		</div>                
	</div>
	<!-- /.card-footer -->
</div>