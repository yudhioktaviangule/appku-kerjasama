import Swal from 'sweetalert2';
import 'sweetalert2/src/sweetalert2.scss';
export default class Alert{
    options={};
    swAlert(message,title,onConfirm=()=>{},icon='success'){
        Swal.fire({
            icon:icon,
            confirmButtonText:`
                <i class='fas fa-check'></i>
            `,
            text:message,
            title:title,
            focusConfirm: true,
            
        }).then(result=>{
            if(result.isConfirmed){
                onConfirm();
            }
        })
    }

    messageBebas(options={
        content:'',
        title:'',
        onConfirm:()=>{
            return null
        },
        onDeny:()=>{
            return null
        },
        onCancel:()=>{
            return null
        }

    }){
        Swal.fire({
            text:options.content,
            title:options.title,
            confirmButtonText:"YA",
            showDenyButton:true,
            denyButtonText:"TIDAK",
            showCancelButton:true,
            cancelButtonText:"BATALKAN"
        }).then(result=>{
            if(result.isConfirmed){
                options.onConfirm()
            }else if(result.isDenied){
                options.onDeny();
            }else{
                options.onCancel();
            }
        })
    }

    swalYesNo(content,title,onConfirm=()=>{},onCancel=()=>{}){
        Swal.fire({
            text:content,
            title:title,
            icon:"question",
            confirmButtonText:"Ya",
            showCancelButton:true,
            cancelButtonText:"Tidak"
        }).then(result=>{
            if(result.isConfirmed){
                onConfirm()            
            }else{
                onCancel()
            }
        })
    }
   

}