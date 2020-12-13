
import MailToKasubag from './dashboard/Mailer';
import OpDataTables from './dashboard/OpDataTable';
import OP_Modals from './dashboard/OpModals';

export default class OpDashboard{
    dataTable = new OpDataTables();
    mail = new MailToKasubag();
    modals = new OP_Modals();
    pejabat
    init(){
        
        this.dataTable.init()
        this.mail.init();
    }
}