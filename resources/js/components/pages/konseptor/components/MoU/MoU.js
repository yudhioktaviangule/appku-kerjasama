import { MOU_FORMAT } from "../../../formats/";



export default class MoU{
    document_id  = '';
    nomor='';
    data;
    docType = 'Nota Kesepakatan';
    constructor(options){
        this.showtable = options.showTable.bind(this);
        this.hidetable = options.hideTable.bind(this);
        this.setTitle = options.setTitle.bind(this);
        this.initializeEditor = options.setEditor.bind(this);
        this.getlist = options.getLengkap.bind(this);
        this.marginer = options.setMarginDoc.bind(this)
        this.olah = options.prosesData.bind(this)
        this.strRplc = options.strRplc.bind(this)
        
     }
    async open(id,nomor){
        this.hidetable();
        this.data = await this.getlist(id)
        
        this.processingWord(nomor);
    }
    processingWord(nomor=''){
        let obj = this.olah(this.data);
        this.rawContent = this.strRplc(obj,MOU_FORMAT)
        this.setTitle(`Nomor Dokumen ${nomor}`)
        $("#isi").val(this.rawContent);
        $("#jdl").val("Nota Kesepakatan")
        this.initializeEditor(this.rawContent);
    }
}