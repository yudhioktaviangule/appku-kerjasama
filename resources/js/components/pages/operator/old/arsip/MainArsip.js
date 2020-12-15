import ArsipDataTable from "./ArsipDataTable";
import { PernyataanKehendak } from "./PernyataanKehendak";
import NotaKesepakatan from './NotaSepakat';
import Perjanjian from './Perjanjian';
import FormPerjanjian from './Component/FormPerjanjian';
import Alert from '../../../../scripts/Alert';

export default class MainArsip {
    dataTable = new ArsipDataTable();
    pernyataanKehendak = new PernyataanKehendak();
    nota = new NotaKesepakatan(); 
    janji = new Perjanjian()
    form = new FormPerjanjian();
    model={
        nomor:'0',
        walikota:'',
        email:'',
    }
    captionTitle = {
        normal: {
            head: "Pilih Dokumen",
            sub: "Pilih dokumen untuk dibuatkan Arsip"
        },
        kehendak: {
            head: "Pernyataan kehendak",
            sub: "No. Dokumen: _NOMOR_"
        },
        nota: {
            head: "Nota Kesepakatan",
            sub: "No. Dokumen: _NOMOR_"
        },
        perjanjian: {
            head: "Perjanjian Kerja Sama",
            sub: "No. Dokumen: _NOMOR_"
        },
    };
    binding(type,value){
        this.model={
            ...this.model,
            [type]:value
        }
    }
    init() {
        this.dataTable.init(this);
        this.setTitle();
        $("#kirim").hide(500);
    }

    submitForm(){
        $("#form-arsip").submit();
    }

    async setKehendak(document_id = "") {
        this.pernyataanKehendak = new PernyataanKehendak(document_id);
        await this.pernyataanKehendak.init()
        $("#kirim").show(500);
    }

    async setPerjanjian(document_id){
        this.janji=new Perjanjian(document_id,this.model);
        await this.janji.init()
    }
    async setNota(document_id=''){
        this.nota = new NotaKesepakatan(document_id);
        await this.nota.init();
        $("#kirim").show(500);
    }

    kirim(){

    }
    setTitle(type = "normal",nomorDocument='') {
        $("#p-title").html(this.captionTitle[type].head);
        let sub = this.captionTitle[type].sub;
        let subTitle = sub.replace(/(_NOMOR_)/g,nomorDocument);
        $("#sub-title").html(subTitle);
    }
    kehendakClick(object) {
        this.setTitle("kehendak",object.nomor);
        this.setKehendak(object.id);
    }
    notaClick(object){
        this.setTitle("nota",object.nomor);
        this.setNota(object.id);
    }
    janjiClick(object){
        this.form.show(object);
        this.setTitle("perjanjian",object.nomor);
    }
    actionToKerjasama(id){
        if(this.validasi()){            
            this.setPerjanjian(id)
            this.form.close();
        }else{
            let p = new Alert();
            p.swAlert("Harap Isi Email,Nama Walikota dan Nomor Nota Kesepakatan Untuk melanjutkan aksi","Galat",()=>{return},"error");
        }
    }
    validasi(){
        
        for (let mod in this.model){
            let val = this.model[mod];
            if(val==''||val==undefined||val=='0'||val==null){
                return false;
            }
        }
        return true;
    }
}
