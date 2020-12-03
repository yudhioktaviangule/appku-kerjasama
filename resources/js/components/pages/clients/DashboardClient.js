
import CreateDataTable from '../../../scripts/DataTable';


class DashboardClient{
    user;
    table=[{name:'name',data:'name'},{name:'aksi',data:'aksi'}];
    dataTable = new CreateDataTable($("#table-perusahaan"));
    init(client){
        let {create} = window.myUrl
        this.dataTable = new CreateDataTable($("#table-perusahaan"))
        let ajaxParam  =  this.dataTable.createAjaxParam(create);
    }
}

export default function DashClient(){
    return new DashboardClient();
}