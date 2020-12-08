const ElementModals={

    lingkup:`<div class="card ">
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
	
	<!-- /.card-footer -->
</div>`,
    pihak1:`
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
                <!--hak-->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Usulan Hak</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <div class="container-fluid">
                                <p>Daftar Usulan Hak</p>
                                <ul id='list-hak-pihak-pertama' class="products-list product-list-in-card pl-2 pr-2">
                                    <li class="item">
                                        <span class="product-description text-center">
                                            Belum Menambahkan List 
                                            
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-footer" x='tbl'>
                            <div class="input-group">
                                <input type="text" autocomplete="off" id='hak1' placeholder='Masukkan Usulan Hak pihak pertama' class="form-control">
                                <span class="input-group-append">
                                        <a href="#" onclick="window.opdashboard.modals.pihak1.addHak($('#hak1'))" class="btn btn-success" >Tambah Usulan</a>
                                </span>
                            </div>
                        </div>
                    </div>
                <!--endhak-->
                </div>


            <!-- end card hak -->  
            
            <!-- card kewajiban -->
            <div class="form-group">
                <!--  kewajiban -->
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
                    <div class="card-footer" x='tbl'>
                        <div class="input-group">
                            <input type="text" autocomplete="off" id='kewajiban1' placeholder='Masukkan Usulan Kewajiban pihak pertama' class="form-control">
                            <span class="input-group-append">
                                    <a href="#" onclick="window.opdashboard.modals.pihak1.addKewajiban($('#kewajiban1'))" class="btn btn-success" >Tambah Usulan</a>
                            </span>
                        </div>
                    </div>
                </div>                
                <!-- end kewajiban -->
            </div>
            <!-- batas card kewajiban -->
        </div>
	    </div>
    </div> `,
pihak2:`

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
                    <!-- content hak -->
                    <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Usulan Hak</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="card-body p-0">
                        <div class="container-fluid">
                            <p>Daftar Usulan Hak</p>
                            <ul id='hak-p2' class="products-list product-list-in-card pl-2 pr-2">
                                <li class="item">
                                    <span class="product-description text-center">
                                        Belum Menambahkan List 
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-footer" x='tbl'>
                        <div class="input-group">
                            <input type="text" autocomplete="off" id='hak2' placeholder='Masukkan Usulan Hak pihak pertama' class="form-control">
                            <span class="input-group-append">
                                    <a href="#" onclick="window.opdashboard.modals.pihak2.addHak($('#hak2'))" class="btn btn-success" >Tambah Usulan</a>
                            </span>
                        </div>
                    </div>
                </div>
                    <!-- end hak -->
                </div>
            <!-- end card hak -->  
            
            <!-- card kewajiban -->
            <div class="form-group">
                    <!--kwjb-->
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
                            <ul id='ls-kewajiban-2' class="products-list product-list-in-card pl-2 pr-2">
                                <li class="item">
                                    <span class="product-description text-center">
                                        Belum Menambahkan List 
                                        
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-footer" x='tbl'>
                        <div class="input-group">
                            <input type="text" autocomplete="off" id='kewajiban2' placeholder='Masukkan Usulan Kewajiban pihak pertama' class="form-control">
                            <span class="input-group-append">
                                    <a href="#" onclick="window.opdashboard.modals.pihak2.addKewajiban($('#kewajiban2'))" class="btn btn-success" >Tambah Usulan</a>
                            </span>
                        </div>
                    </div>
                </div>
                    <!--e_kwjb-->
                </div>
            <!-- batas card kewajiban -->
        </div>
	</div>
</div>
`,
}

export default ElementModals;