
import Modals from '../../../../scripts/Modals';
import TempusDominusBS from '../../../../scripts/Tempus';
import { BS4_INPUT_FORMAT,TEMPUS_DATE_TIME } from '../../formats/forms/format';



export default class AgendaRapat{
    id;
    init(){
        $(".card-footer").hide();
    }
    createAgenda(dokumen_id){
       this.id=dokumen_id; 
        let tempus = new TempusDominusBS();
        let tanggal = TEMPUS_DATE_TIME.replace(/_TIMEPICKID_|_CAPTION_|_ICON_/gi,match=>
            {
                let obj={
                    _TIMEPICKID_:"tanggal",
                    _CAPTION_:"Tanggal Rapat",
                    _ICON_:"fa-calendar"
                }
                return obj[match]
        });
        let waktu = TEMPUS_DATE_TIME.replace(/_ICON_|_TIMEPICKID_|_CAPTION_/gi,match=>
            {
                let obj={
                    _TIMEPICKID_:"waktu",
                    _CAPTION_:"Waktu Rapat",
                    _ICON_:"fa-clock"
                }
                return obj[match]
        });
        let tempat = BS4_INPUT_FORMAT.replace(/_FINCTION_|_NAME_|_CAPTION_/gi,match=>{
            let obj={
                _NAME_:"tempat",
                _CAPTION_:"Tempat",
                _FINCTION_:"",
            }
            return obj[match]
        })
        const html = `
            ${tempat}
            ${tanggal}
            ${waktu}
        `;
        $("#agenda-wrapper").html(html);
        tempus.timePick($("#waktu"),"HH:mm");
        tempus.timePick($("#tanggal"),"YYYY-MM-DD");
        $(".card-footer").toggle('show');
        $("#btn-agenda").toggle('hide');
        
    }

    save(){
        let model = {
            tanggal:$("[name='tanggal']").val(),
            waktu:$("[name='waktu']").val()+":00",
            tempat:$("#tempat").val(),
            document_id:this.id,
        }
        let form = $("#hidden-form");
        model = JSON.stringify(model);
        $("[name='valJSON']").val(model);
        form.attr("action",window.myUrl.agenda.store);
        form.submit();
    }
}