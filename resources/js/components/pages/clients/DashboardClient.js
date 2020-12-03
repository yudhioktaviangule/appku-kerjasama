
import CreateDataTable from '../../../scripts/DataTable';


class DashboardClient{
    user;
    dataTable = new CreateDataTable($("#table-perusahaan"));
    init(client){
        this.dataTable = new CreateDataTable($("#table-perusahaan"))
        this.dataTable.dataTable();
    }
}

export default function DashClient(){
    return new DashboardClient();
}