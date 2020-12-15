
import KbDataTable from './dashboard/OpDataTable';
import KbModals from './dashboard/OpModals';
import MailerToHukum from './dashboard/Mailer';

export default class KbDashboard{
    dataTable = new KbDataTable();
    modals = new KbModals();
    mailer=new MailerToHukum()
    init(){
        
        this.dataTable.init()
        this.mailer.init();
    }
}