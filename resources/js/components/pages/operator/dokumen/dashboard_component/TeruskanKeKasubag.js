
import Modals from '../../../../../scripts/Modals';
import MyAjax from '../../../../../scripts/Ajax';
import Alert from '../../../../../scripts/Alert';


class TeruskanKeKasubag{
    url_save;
    async openModals(document_id){
        const { teruskanKasubag : { 
            create:url_create_tmp,
            store:url_store,
        }} = window.myUrl;
        this.url_save = url_store;
        const modal   = new Modals(url_create_tmp.replace(/_DOC_/g,document_id),'','Teruskan Ke Kasubag',false);
        await modal.ajax()
        modal.openModal();
    }
    async save(id){
        const pesan = new Alert();
        const url   = this.url_save;
        const ajax  = new MyAjax(url);
        const res   = await ajax.send({
            status     : "2",
            document_id: id,
            _token:$("[name=_token]").val(),
        })
        const {message,isError} = res;
        pesan.swAlert(message,"Kirim Dokumen ke Kasubag",()=>{
            $('[data-dismiss="modal"]').click()
            return null;
        },isError?"error":"success");
    }
}


export default TeruskanKeKasubag;