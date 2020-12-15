import Dokumen from "./document/Dokumen";
import HakDanKewajiban from './hakewajiban/ClientHakdanKewajiban';
import RuangLingkupClient from './lingkup/ClientRuangLingkup';



export default class Klien{
    id='';
    documents = new Dokumen();
    hdk = new HakDanKewajiban();
    rLingkup = new RuangLingkupClient();
    init(id=''){
        this.id=id;
        this.documents=new Dokumen(id)
        return this;
    }
}