import { KEHENDAK_KONSEPTOR_FORMAT } from "../../../formats";




export default class PernyataanKehendak{
    document_id  = '';
    nomor='';
    showtable;
    hidetable;
    docType = 'Pernyataan Kehendak';
    setTitle;
    initializeEditor
    getlist;
    marginer;
     constructor(options){
       this.showtable        = options.showTable.bind(this);
       this.hidetable        = options.hideTable.bind(this);
       this.setTitle         = options.setTitle.bind(this);
       this.initializeEditor = options.setEditor.bind(this);
       this.getlist          = options.getLengkap.bind(this);
       this.marginer         = options.setMarginDoc.bind(this)
       this.olah             = options.prosesData.bind(this) 
       this.replacetor       = options.strRplc.bind(this)
       //this.setContent();
    }
    async setContent(id){
        let data = await this.getlist(id);

        this.content = this.replacetor(this.olah(data),KEHENDAK_KONSEPTOR_FORMAT)
        this.content = this.marginer(this.content);
    }
    async open( id = '', nomor = ''){
        $("#jdl").val("Pernyataan Kehendak")
        this.document_id=id;
        await this.setContent(id);
        this.hidetable();
        this.setTitle(`Nomor Dokumen ${nomor}`)
        $("#isi").val(this.content);
        this.initializeEditor(this.content);
    }
}