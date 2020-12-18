



export default class PerjanjianKerjasama{
    document_id  = '';
    nomor='';
    showtable;
    hidetable;
    docType = 'Perjanjian Kerjasama';
    titleBinder;
    constructor(bindHide=()=>{},bindShow=()=>{},titleBinder=()=>{}){
        this.showtable = bindShow.bind(this);
        this.hidetable = bindHide.bind(this);
        this.titleBinder = titleBinder.bind(this);
    }
    openKehendak = (id='',nomor='') => {
        this.document_id=id;
        this.hidetable();
        this.titleBinder(`Nomor Dokumen ${nomor}`)
    }    
}