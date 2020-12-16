
import CreateDataTable from '../../../../scripts/DataTable';



export default class DataTable{
    col=[
        {data:'nomor',name:"nomor"},
        {data:'instansi',name:"instansi"},
        {data:'tentang',name:"tentang"},
        {data:'dinas_tujuan',name:"dinas_tujuan"},
        {data:'aksi',name:"aksi"},
    ];
    kasubag
    init(id=''){
        this.kasubag=id;
        this.tableDom= $("#table-kasubag");
        this.createMyDtb();
    }

    createMyDtb(){
        const {
            dash:{
                dataTable:url,
            }
        } = window.myUrl;
        const dtb = new CreateDataTable(this.tableDom);
        dtb.dataTable(this.col,dtb.createAjaxParam(url));
    }
}