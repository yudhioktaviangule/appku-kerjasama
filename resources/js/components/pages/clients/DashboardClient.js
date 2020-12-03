
import CreateDataTable from '../../../scripts/DataTable';


class DashboardClient{
    user;
    table=[{name:'name',data:'name'},{name:'aksi',data:'aksi'}];
    dataTable = new CreateDataTable($("#table-perusahaan"));
    init(client){
        this.user=client;
        
    }
    dataTable(){
        let {create} = window.myUrl
        this.dataTable = new CreateDataTable($("#table-perusahaan"))
        let ajaxParam  =  this.dataTable.createAjaxParam(create,{uid:this.user});
        this.dataTable.dataTable(this.table,ajaxParam);
    }
}

export default function DashClient(){
    return new DashboardClient();
}