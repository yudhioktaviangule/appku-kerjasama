import Modals from '../../../../scripts/Modals';
import { SelectDua } from '../../../../scripts/SelectDua';
import CKeditor from '../../../../plugin/ckeditor/index';

export default class FormDokumen{
    pjid = 0;
    editore = new CKeditor(); 
    init(penanggung){
        this.pjid = penanggung;
        return this;
    }
    select2 = new SelectDua();
    
    async loadForm(title='',onload=null){
        const {
                dokumen:{
                    create:regex,
                    store:simpan
                    },
                pejabat:{
                    select2:sel2,
                }
               } = myUrl
        let url = regex.replace(/(@pjid)/g,this.pjid)
        const modals = new Modals(url,simpan,title,false)
        await modals.ajax();
        modals.openModal(()=>{
            if(onload!=null){
                onload()
                const obj = {
                    _count_:5,
                    _limit_:5,
                    _offset_:0,

                }
                let matchet = new RegExp(`/(_count_|_limit_|_offset_)/gi`);
                url = sel2.replace(matchet,(match)=>{
                    return obj[match];
                })

                this.select2.createAJax(url);
                this.select2.setObject($("#slc"));
                const template=(state={id:0,text:"0"})=>{
                    console.log(state);
                    if(!state.id){
                        return state.text
                    }
                    let $state = $(`
                        
                        <strong>${state.text}</strong><br>
                        <span>${state.name}</span><br>
                    
                    `)
                    return $state;
                }
                this.select2.selectDua({
                    templateResult:template
                });
                $("input[name='penanggung_jawab_id']").val(this.pjid);
               this.editore.ck('justify,textindent');
                const {ckeditor} = this.editore;
                ckeditor.replace("maksud");
                ckeditor.replace("tujuan");
                ckeditor.replace("pelaksanaan");
                ckeditor.replace("ketentuan_hukum");

                
            }
        },true)
        return this;
    }
}