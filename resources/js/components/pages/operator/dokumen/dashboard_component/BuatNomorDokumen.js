
import Modals from '../../../../../scripts/Modals';
import MyAjax from '../../../../../scripts/Ajax';
import Alert from '../../../../../scripts/Alert';
import DisableEnter from '../../../../../scripts/FormInputDisable';


export default class BuatNomorDokumen{
    url={
        get   : '',
        action: '',
    };
    setUrls(document_id){
        const {
            nomorDoc:{
                create:url_create,
                store:url_store,
            }
        }=window.myUrl;
        this.url.get    = url_create.replace(/(_DOC_)/g,document_id)
        this.url.action = url_store
    }
    async openModals(document_id){
        this.setUrls(document_id);
        const modal = new Modals(this.url.get,'',"Buat Nomor Dokumen",false);
        await modal.ajax();
        modal.openModal(()=>{
            DisableEnter();
            return 0;
        },false);
    }
    init(){
        return this;
    }
    async save(doc_id){
        const pesan = new Alert();
        const model = {
            document_id: doc_id,
            nomor      : $("#nomor").val(),
            _token     : $("input[name='_token']").val()
        }
        const ajax = new MyAjax(this.url.action)
        const {message,isError}   = await ajax.send(model);
        if(isError){
            pesan.swAlert(message,"Update Dokumen",()=>{
                $("[data-dismiss='modal']").click(); 
                return false;
            },'error');
        }else{
            pesan.swAlert(message,"Update Dokumen",()=>{
                $("[data-dismiss='modal']").click(); 
                return false;
            },'success');

        }
        
    }
}