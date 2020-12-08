
import KbDataTable from './dashboard/OpDataTable';
import KbModals from './dashboard/OpModals';

export default class KbDashboard{
    dataTable = new KbDataTable();
    modals = new KbModals();
    init(){
        
        this.dataTable.init()
    }
}