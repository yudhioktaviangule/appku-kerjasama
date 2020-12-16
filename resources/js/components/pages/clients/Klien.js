import Dokumen from "./document/Dokumen";
import HakDanKewajiban from './hakewajiban/ClientHakdanKewajiban';
import RuangLingkupClient from './lingkup/ClientRuangLingkup';



export default class Klien{
    id='';
    documents;
    hdk;
    rLingkup
    init(id=''){
        this.id        = id;
        this.documents = new Dokumen(id)
        this.hdk       = new HakDanKewajiban();
        this.rLingkup  = new RuangLingkupClient();
        return this;
    }
}