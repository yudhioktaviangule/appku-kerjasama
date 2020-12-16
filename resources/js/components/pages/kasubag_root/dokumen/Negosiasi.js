
import { ajax } from 'jquery';
import Modals from '../../../../scripts/Modals';



export default class Negosiasi{
    id;
    init(document_id){
        this.id=document_id;
        this.url = {
            get:()=>{
                const{ negosiasi:{create:url_tmp}} = window.myUrl;
                const xurl = url_tmp.replace(/_DOC_/g,this.id);
                return xurl;
            },
            store:()=>{
                const{ negosiasi:{store:xurl}} = window.myUrl;
                
                return xurl;
            }

        }
    }

    async openModals(document_id){
        this.init(document_id);
        const modal = new Modals(this.url.get(),'',"Lihat Dokumen",false);
        await modal.ajax();
        modal.openModal(()=>{return 0},true);
    }

}