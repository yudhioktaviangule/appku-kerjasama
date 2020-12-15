
import CreateDataTable from '../../../../scripts/DataTable';

export default class OpDataTables{
    columns=[
        {name:'no',data:'no'},
        {name:'pengirim',data:'pengirim'},
        {name:'tentang',data:'tentang'},
        {name:'tanggal',data:'tanggal'},
        {name:'tujuan',data:'tujuan'},
        {name:'aksi',data:'aksi'},
    ];
    table = $("#tb-doc")
    dataTable=new CreateDataTable();
    
    init(){
        const { document:{dataTable:url} } =window.myUrl
        this.dataTable = new CreateDataTable(this.table);
        console.log(url);
        let ajax = this.dataTable.createAjaxParam(url)
        this.dataTable.dataTable(this.columns,ajax);
    }
}