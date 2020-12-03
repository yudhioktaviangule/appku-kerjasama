
import CreateDataTable from '../../../scripts/DataTable';


class DashboardClient{
    user;
    table=[{name:'name',data:'name'},{name:'aksi',data:'aksi'}];
    dataTable = new CreateDataTable($("#table-perusahaan"));
    init(client){
        this.dataTable = new CreateDataTable($("#table-perusahaan"))
        let ajaxParam  =  this.dataTable.createAjaxParam(url);
    }
}

export default function DashClient(){
    return new DashboardClient();
}