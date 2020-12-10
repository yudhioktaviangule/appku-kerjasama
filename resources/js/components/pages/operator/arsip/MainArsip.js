
import ArsipDataTable from './ArsipDataTable';
import { PernyataanKehendak } from './PernyataanKehendak';


export default class MainArsip{
    dataTable = new ArsipDataTable();
    pernyataanKehendak = new PernyataanKehendak();
    init(){
        this.dataTable.init(this);
    }

    setKehendak(document_id=''){
        this.pernyataanKehendak = new PernyataanKehendak(document_id);
    }
    pernyataanKehendakClick(){
        
    }
}