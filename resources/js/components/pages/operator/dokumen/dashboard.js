
import DashboardDataTable from './dashboard_component/DashboardDataTable';
import BuatNomorDokumen from './dashboard_component/BuatNomorDokumen';
import TeruskanKeKasubag from './dashboard_component/TeruskanKeKasubag';


export default class OperatorDashboard{
    init(){
        this.dataTable      = new DashboardDataTable()
        this.nomorDoc       = new BuatNomorDokumen()
        this.terukanKasubag = new TeruskanKeKasubag(); 
        return this;
    }
    setDataTable(id=''){
        this.dataTable.init(id)
        return this.dataTable;
    }
}