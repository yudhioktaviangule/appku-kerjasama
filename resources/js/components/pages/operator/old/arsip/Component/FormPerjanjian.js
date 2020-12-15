import { FORM_ELEMENT } from "../KerjasamaContentFormat/Kjs";
import Modals from '../../../../../scripts/Modals';



export default class FormPerjanjian{
    ELEMENT = FORM_ELEMENT;
    Modal = new Modals('','','Buat Surat Kerjasama',false);
    show(object){
        let el= this.ELEMENT.replace(/(@obxj@)/g,object.id); 
        this.Modal.openModal(()=>{
            $(".modal-body").html(el);
            
        })
    }
    close(){
        this.Modal.closeModal();
    }

}