
import OpDataTables from './dashboard/OpDataTable';
import OP_Modals from './dashboard/OpModals';

export default class OpDashboard{
    dataTable = new OpDataTables();
    modals = new OP_Modals();
    init(){
        
        this.dataTable.init()
    }
}