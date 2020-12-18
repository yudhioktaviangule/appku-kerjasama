import { DataTableKonseptor, MoU, PerjanjianKerjasama, PernyataanKehendak } from "./components";
import CKeditor from '../../../plugin/ckeditor/index';
import MyAjax from '../../../scripts/Ajax';


export default class Konseptor{
    constructor(){
        this.setEditor();
    }
    hideTable(){
        $("#table-wrapper").hide(500,()=>{
            $("#document-wrapper").show(500);
        });
        $("#bt-back").show(500);
        $("#bt-arsip").show(500);
    }
    showTable(){
        $("#document-wrapper").hide(500,()=>{
            $("#table-wrapper").show(500);
        });
        $("#bt-back").hide(500);
        $("#bt-arsip").hide(500);
    }
    setTitle(deskripsi=''){
        $("#title-atas").html(this.docType)
        $("#deskripsi").html(deskripsi);
    }
    setMarginDoc(data){
        return `
            <div style='margin:2.5cm'>
                ${data}
            </div>
        `;
    }
    setEditor(data){
        if(this.xeditor==undefined){
            this.xeditor = new CKeditor();
            this.xeditor.ck("justify,textindent",800)
            
            this.xeditor.ckeditor.replace("isi")
        }
        this.xeditor.ckeditor.instances.isi.setData(data)

       
        console.log(this.xeditor.instances);
    }

    async getLengkap(id){
        const {dokumen:{lengkap:url_tmp}} = window.myUrl;
        const url = url_tmp.replace(/_cekdok_/g,""+id);
        const ajax = new MyAjax(url);
        const data = await ajax.get(url);
        return data;
    }
    strRplc(obj,strz){
        let data = strz.replace(
            /(_TENTANG_|_KETENTUAN_UMUM_|_PELAKSANAAN_|_NOMOR_|_JABATANP1_|_P1_|_INSTANSIP1_|_P2_|_JABATANP2_|_INSTANSIP2_|_USER_EMAIL_|_LINGKUP_)/gi,match=>{
                return obj[match];
            });
        return data;
    }
    prosesData(arrayx){
        const {
            data:{
                lingkup:RUANG_LINGKUP,
                hdank:HAK_DAN_KEWAJIBAN,
                dokumen:{
                    tentang:_TENTANG_,
                    ketentuan_umum:_KETENTUAN_UMUM_,
                    maksud_dan_tujuan:_MAKSUD_DAN_TUJUAN_,
                    pelaksanaan:_PELAKSANAAN_,
                    nomor:_NOMOR_
                    
                },
                dinas_tujuan:{
                    jabatan:_JABATANP1_,
                    name:_P1_,
                    instansi:_INSTANSIP1_,
                },
                dari:{
                    penanggung_jawab:{
                        penandatangan:_P2_,
                        jabatan:_JABATANP2_
                    },
                    perusahaan:{
                        name:_INSTANSIP2_,
                    },
                    user:{
                        email:_USER_EMAIL_,
                    }
                }
            }
        } = arrayx;
        let obj = {
            _LINGKUP_:`<ul>_ITEM_LINGKUP_</ul>`,
            _HAKP1_:`<ul>_ITEM_HAKP1_</ul>`,
            _HAKP2_:`<ul>_ITEM_HAKP2_</ul>`,
            _KWP2_:`<ul>_ITEM_KWP2_</ul>`,
            _KWP1_:`<ul>_ITEM_KWP1_</ul>`,
            RUANG_LINGKUP:RUANG_LINGKUP,
            HAK_DAN_KEWAJIBAN:HAK_DAN_KEWAJIBAN,
            _TENTANG_:_TENTANG_,
            _KETENTUAN_UMUM_:_KETENTUAN_UMUM_,
            _MAKSUD_DAN_TUJUAN_:_MAKSUD_DAN_TUJUAN_,
            _PELAKSANAAN_:_PELAKSANAAN_,
            _NOMOR_:_NOMOR_,
            _JABATANP1_:_JABATANP1_,
            _P1_:_P1_,
            _INSTANSIP1_:_INSTANSIP1_,
            _P2_:_P2_,
            _JABATANP2_:_JABATANP2_,
            _INSTANSIP2_:_INSTANSIP2_,
            _USER_EMAIL_:_USER_EMAIL_,

        }
        return obj;
    }

    onBackPress(){
        this.showTable();
        $("#title-atas").html("Daftar Dokumen")
        $("#deskripsi").html(`Daftar Dokumen yang statusnya <strong>Siap ditanda tangani</strong>`);
    }
    init(){
        this.showTable();
        this.dataTable  = new DataTableKonseptor();
        this.kehendak   = new PernyataanKehendak(this);
        this.mou        = new MoU(this);
        this.perjanjian = new PerjanjianKerjasama();
        
    }

    
}