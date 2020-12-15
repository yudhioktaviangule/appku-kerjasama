
import MailToKasubag from './dashboard/Mailer';
import OpDataTables from './dashboard/OpDataTable';
import OP_Modals from './dashboard/OpModals';
import Walikota from '../../kasubag_root/Walikota';

export default class OpDashboard{
    dataTable = new OpDataTables();
    mail = new MailToKasubag();
    modals = new OP_Modals();
    pejabat = new Walikota;
    init(){
        
        this.dataTable.init()
        this.mail.init();
    }
}