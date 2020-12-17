
import DataTable from './dokumen/DataTable';
import Negosiasi from './dokumen/Negosiasi';
import Hukum from '../hukum/Hukum';
import AgendaRapat from './dokumen/AgendaRapat';

export default class Kasubag{
    id='';
    dataTable;
    init(kasubag_id){
        this.id=kasubag_id
        this.dataTable = new DataTable()
        this.nego = new Negosiasi();
        this.hakAccessHukum = new Hukum();
        this.agenda = new AgendaRapat();
    }
}