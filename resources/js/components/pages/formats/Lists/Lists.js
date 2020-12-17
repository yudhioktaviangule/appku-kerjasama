export const ListFormat=`
<div class="card _CLASS_ ">
	<div class="card-header _WARNA_">
		<h3 class="card-title">_JUDUL_</h3>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse">
				<i class="fas fa-minus"></i>
			</button>
		</div>
	</div>
	
	<div class="card-body p-0">
		<div class="container-fluid">
            _KONTEN_
        </div>
    </div>
    _FOOTER_
</div>



`
export const CARD_FOOTER_FMT=`
<div name='foter' class="card-footer">
		<div class="input-group">
			<input type="text"   id='_IDOBJECT_' placeholder='_PLACEHOLDER_' class="form-control">
			<span class="input-group-append">
				<a href="#" onclick="_FNC_" class="btn btn-success">_BTNCAPS_</a>
			</span>
		</div>                
	</div>

`;
export const ItemListFormat=`
        <ul class="products-list product-list-in-card pl-2 pr-2">
            _KONTEN_
        </ul>
`

export const ItemContent=`
<li class="item">
                    <div class='container-fluid'>
                        <div class='row justify-content-between'>
                            
                            <span class="product-description" 
                                style='width:90%;
                                        white-space:normal;
                                        overflow-wrap: break-word;
                                        
                                        '>
                                <span class='flex-row justify-content-between align-items-start' >
                                    <span class='p-0' >_NOMOR_.</span>
                                    <span class='p-8' style='text-align:justify;'>
                                        _NILAI_
                                    </span>
                                </span>
                            </span>
                            <button name='bt-simpan' type='button' onclick='_FNC_' aria-label='Close' class='close text-danger _ISFADE_' href='#'>
                                <span aria-hidden='true'>
                                <strong>&times;</strong>
                                </span>
                            </button>
                        </div>
                    </div>
			    </li> 
`;