import Modals from "../../../../scripts/Modals";
import MyAjax from "../../../../scripts/Ajax";
import Alert from '../../../../scripts/Alert';
import DisableEnter from '../../../../scripts/FormInputDisable';



import {
    ListFormat,
    CARD_FOOTER_FMT,
    ItemContent,
    ItemListFormat
} from "../../formats/Lists/Lists";

export default class RuangLingkupClient {
    document_id = "";
    list = [];
    async openModal(dokumen = "") {
        console.log("preparing modal....");
        const {
            rlingkup: { modals }
        } = window.myUrl;
        this.document_id = dokumen;
        const url        = modals.replace(/_DOC_/g, this.document_id);
        await this.modals(url);
    }
    async modals(urlGet) {
        console.log("send request....");
        const modls = new Modals(urlGet, "", "Ruang Lingkup", false);
        await modls.ajax();
        modls.openModal(() => {
            this.processing();
            return false;
        }, false);
        console.log("opening");
    }

    async processing() {
        await this.getList();
        let wrapper = this.createContentWrapper();
        wrapper     = this.iterateList(wrapper);
        this.draw(wrapper);
    }

    draw(content){
        $("#my-lingkup").html(content);
        setTimeout(() => {
            DisableEnter(()=>{$("#lingkup").val(),'active'});
            $("#load-data").hide();
        }, 1000);
    }
    async getList() {
        const {
            rlingkup: { list: url_tmp }
        } = window.myUrl;
        const url      = url_tmp.replace(/(_DOC_)/g, this.document_id);
        const ajax     = new MyAjax();
        const { data } = await ajax.get(url);
        this.list      = data;
        console.log('a',this.list);
    }

    iterateList(w){
        let html = '';
        let i    = 1;
        for(let ls of this.list){
            if(ls.status==='active'){
                let zitemContent=ItemContent;
                let repl = zitemContent.replace(/(_NOMOR_|_NILAI_|_FNC_|_ISFADE_)/gi,match=>{

                        let obj = { 
                            _NOMOR_:i,
                            _NILAI_:ls.lingkup,
                            _FNC_:`window.lingkup.delete(${ls.id})`,
                            _ISFADE_:"",
                        };
                        //console.log("repl",obj);
                        return obj[match];
                    });   
                   // console.log("replacement",repl)             
                html += repl

                i++;
            }
        }
        console.log("NKD",html);
        const _ItemList = ItemListFormat.replace(/(_KONTEN_)/g,html);
        let cont=w.replace(/(_KONTEN_)/g,_ItemList) ;
        return cont;
    }

    createContentWrapper() {
        let formatWrap = ListFormat.replace(
            /(_CLASS_|_WARNA_|_JUDUL_|_FOOTER_)/gi,
            match => {
                let fFot = CARD_FOOTER_FMT.replace(/(_IDOBJECT_|_PLACEHOLDER_|_FNC_|_BTNCAPS_)/gi,matc_ft=>{
                    const obj={
                        _IDOBJECT_   : "lingkup",
                        _PLACEHOLDER_: "Masukkan data RUANG LINGKUP",
                        _FNC_        : `window.lingkup.save($('#lingkup').val(),'active')`,
                        _BTNCAPS_    : `Kirim`,
                    }
                    return obj[matc_ft];
                });
                let obj = {
                    _CLASS_ : "card-primary",
                    _WARNA_ : "",
                    _JUDUL_ : "Ruang Lingkup",
                    _FOOTER_: `${fFot}
                        <div class='overlay dark' id='load-data'>
                            <i class="fas fa-2x fa-circle-notch fa-spin"></i>
                        </div>`,
                };
                return obj[match];
            }
        );
       return formatWrap;
    }

    async save(lingkup,status) {
        const pesan = new Alert();
        if(lingkup===''){
            pesan.swAlert("Harap isi semua isian untuk dapat menyimpan data","Isian Kosong",()=>{
                return null
            },'error');
            return;
        }
        try{

            const model = {
                lingkup:lingkup,
                status:status,
                document_id:this.document_id,
                _token:$("input[name='_token']").val(),
            }
            const {
                rlingkup:{store:url}
            } = window.myUrl;
            const ajax = new MyAjax(url)
            await ajax.send(model);
            await this.processing();
        }catch(e){
            
            pesan.swAlert('Tidak dapat Menyimpan Dokumen','Galat',()=>{return false},'error')
            await this.processing();
        }
    }
    async delete(id) {
        const pesan = new Alert();
        pesan.swalYesNo("Ingin Menghapus Ruang Lingkup ini?","Hapus Ruang Lingkup",async ()=>{
            const {
                rlingkup:{delete:url_tmp}
            } = window.myUrl;
    
            const url = url_tmp.replace(/(_DOC_)/g,id);
            const ajax = new MyAjax(url);
            const model = {
                _method:'delete',
                _token:$("input[name='_token']").val(),
            }
            await ajax.send(model);
            await this.processing();

        },()=>{
            return 0;
        })
    }
}
