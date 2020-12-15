
import Modals from '../../../../../scripts/Modals';
import { SelectDua } from '../../../../../scripts/SelectDua';


export default class FormDokumen{
    penanggunJawabId=0;
    constructor(pen=0){
        if(pen!=0){
            this.penanggunJawabId=pen;
        }
    }    

    async openModalAdd(onShow=undefined){
        const {dokumen:{create:urlGet,store:urlAction}} = myUrl;
        const modal = new Modals(urlGet,urlAction,"Register Dokumen Baru",true);
        await modal.ajax();
        modal.openModal(()=>{
            this.select2ku()
            return false;
        },true)

    }

    async select2ku(){
        let obj = $("#dinas-tujuan");
        let sel = new SelectDua();
        
    }

}