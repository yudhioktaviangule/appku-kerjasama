
import { ajax } from 'jquery';
import Modals from '../../../../scripts/Modals';
import HakDanKewajiban from './nego_component/HakDanKewajiban';
import MyAjax from '../../../../scripts/Ajax';



export default class Negosiasi{
    id;
    hdank;
    init(document_id){

        this.id    = document_id;
        this.hdank = new HakDanKewajiban();
        this.url   = {
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

    async teruskanBagHukum(){
        const url = ()=>{
            const {
                negosiasi:{
                    update:url_tmp
                }
            } = window.myUrl
            const url = url_tmp.replace(/(_DOC_)/g,this.id);
            return url;
        }

        const ajax = new MyAjax(url());
        const {message,isError} = await ajax.send({
            _token:$('[name="_token"]').val(),
            _method:"update",
            status:"5",
        })
    
    }

}