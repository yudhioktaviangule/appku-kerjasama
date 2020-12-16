
import DataTable from './dokumen/DataTable';
import Negosiasi from './dokumen/Negosiasi';

export default class Kasubag{
    id='';
    dataTable;
    init(kasubag_id){
        this.id=kasubag_id
        this.dataTable = new DataTable()
        this.nego = new Negosiasi();
    }
}