
import Modals from '../../../../scripts/Modals';



export default class FormDokumen{
    pjid = 0;
    init(penanggung){
        this.pjid = penanggung;
        return this;
    }
    async loadForm(title='',onload=null){
        const {
                dokumen:{
                    create:regex,
                    store:simpan
                    }
               } = myUrl
        const url = regex.replace(/(@pjid)/g,this.pjid)
        const modals = new Modals(url,simpan,title,true)
        await modals.ajax();
        modals.openModal(()=>{
            if(onload!=null){
                onload()
            }
        },true)
        return this;
    }
}