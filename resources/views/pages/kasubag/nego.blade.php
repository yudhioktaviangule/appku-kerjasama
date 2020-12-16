
<div class="container-fluid">
    <div class="col">
        <div class="card card- card-outline card-outline-tabs">
            <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" 
                            id="ctf-umum-tab" 
                            data-toggle="pill" href="#ctf-umum" 
                            role="tab" 
                            aria-controls="ctf-umum" 
                            aria-selected="true">Informasi Umum</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" 
                            id            = "ctf-maksud-tab" 
                            data-toggle   = "pill" 
                            href          = "#ctf-maksud" 
                            role          = "tab" 
                            aria-controls = "ctf-maksud" 
                            aria-selected = "false">
                            Maksud Dan Tujuan
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" 
                            id            = "ctf-ketentuan-tab" 
                            data-toggle   = "pill" 
                            href          = "#ctf-ketentuan" 
                            role          = "tab" 
                            aria-controls = "ctf-ketentuan" 
                            aria-selected = "false">
                            Ketentuan Umum
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" 
                            id            = "ctf-lingkup-tab" 
                            data-toggle   = "pill" 
                            href          = "#ctf-lingkup" 
                            role          = "tab" 
                            aria-controls = "ctf-lingkup" 
                            aria-selected = "false">
                            Ruang Lingkup
                        </a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link" 
                            id            = "ctf-pelaksanaan-tab" 
                            data-toggle   = "pill" 
                            href          = "#ctf-pelaksanaan" 
                            role          = "tab" 
                            aria-controls = "ctf-pelaksanaan" 
                            aria-selected = "false">
                            Pelaksanaan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" 
                            id            = "ctf-pelaksanaan-tab" 
                            data-toggle   = "pill" 
                            href          = "#ctf-hakwajib" 
                            role          = "tab" 
                            aria-controls = "ctf-hakwajib" 
                            aria-selected = "false">
                            Hak dan Kewajiban
                        </a>
                    </li>
                    
                   
                    
                </ul>
            </div>
    
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                    <div 
                        class           = "tab-pane fade show active" 
                        id              = "ctf-umum" 
                        role            = "tabpanel" 
                        aria-labelledby = "ctf-umum-tab">
                        @include("pages.kasubag.nego_component.infoumum")
                        
                    </div>
                    
                    <div 
                        class="tab-pane fade" 
                        id="ctf-ketentuan" 
                        role="tabpanel" 
                        aria-labelledby="ctf-ketentuan-tab">
                        @include("pages.kasubag.nego_component.ketentuan")
                    </div>

                    
                    <div 
                        class="tab-pane fade" 
                        id="ctf-pelaksanaan" 
                        role="tabpanel" 
                        aria-labelledby="ctf-pelaksanaan-tab">
                        @include("pages.kasubag.nego_component.pelaksanaan")
                    </div>


                    <div 
                        class="tab-pane fade" 
                        id="ctf-maksud" 
                        role="tabpanel" 
                        aria-labelledby="ctf-maksud-tab">
                        @include("pages.kasubag.nego_component.maksud")
                    </div>
                    <div 
                        class="tab-pane fade" 
                        id="ctf-lingkup" 
                        role="tabpanel" 
                        aria-labelledby="ctf-lingkup-tab">
                        @include("pages.kasubag.nego_component.lingkup")
                    </div>
                    <div 
                        class="tab-pane fade" 
                        id="ctf-hakwajib" 
                        role="tabpanel" 
                        aria-labelledby="ctf-hakwajib-tab">
                        @include("pages.kasubag.nego_component.hakwajib")
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>

</div>
