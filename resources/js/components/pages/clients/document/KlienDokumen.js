import Dokumen from "./Dokumen";



export default class Klien{
    id='';
    documents = new Dokumen();
    init(id=''){
        this.id=id;
        this.documents=new Dokumen(id)
        return this;
    }
}