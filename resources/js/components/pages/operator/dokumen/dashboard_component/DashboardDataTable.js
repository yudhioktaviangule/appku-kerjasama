
import CreateDataTable from '../../../../../scripts/DataTable';


export default class DashboardDataTable{
    operator='';
    tableDom;
    ajaxDtb;
    column=[
        {name:"nomor",data:'nomor'},
        {name:"instansi",data:'instansi'},
        {name:"tentang",data:'tentang'},
        {name:"dinas_tujuan",data:'dinas_tujuan'},
        {name:"aksi",data:'aksi'},
    ];
    init(op_id=''){
        this.operator=op_id;
        this.tableDom= $("#table-operator");
        this.createMyDtb();
    }

    createMyDtb(){
        const {
            dash:{
                dataTable:url,
            }
        } = window.myUrl;
        const dtb = new CreateDataTable(this.tableDom);
        dtb.dataTable(this.column,dtb.createAjaxParam(url));
    }

}