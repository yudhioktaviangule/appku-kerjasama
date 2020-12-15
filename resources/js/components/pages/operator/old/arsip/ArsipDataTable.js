import CreateDataTable from "../../../../scripts/DataTable";


export default class ArsipDataTable{
    columns=[
        {name:'nomor',data:'nomor'},
        {name:'instansi',data:'instansi'},
        {name:'tentang',data:'tentang'},
        {name:'aksi',data:'aksi'},
    ];
    table = `                    
    <table class="table table-bordered" id='table-arsip'>
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Perusahaan/Instansi</th>
                <th>Tentang</th>
                <th>
                    <div class="text-right">
                        Aksi
                    </div>
                </th>
            </tr>
        </thead>
    </table>
    `;
    init(main){

        const {arsip:{dataTable:dt}} = window.myUrl;
        
        $("#body-content").html(this.table)
        
        const url = dt;
        let tbl = new CreateDataTable($("#table-arsip"));
        let ajax = tbl.createAjaxParam(url,{});
        tbl.dataTable(this.columns,ajax,{});
    }

}