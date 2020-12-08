
import Modals from '../../../../scripts/Modals';
import ElementModals from './ElementModals';
import RuangLingkup from '../../clients/RegDokumen/RuangLingkup';
import PihakPertama from '../../clients/RegDokumen/PihakPertama';
import PihakKedua from '../../clients/RegDokumen/PihakKedua';

export default class OP_Modals{ 
    formEl=`
    <auth></auth>
    <put></put>
    <div class="form-group">
        <label for="">Nomor Dokumen</label>
        <input required type="text" class="form-control" name='nomor'>
    </div>
    <div class="form-group">
        <label for="">Tentang</label>
        <p>@tentang@</p>
    </div>
    <div class="form-group">
        <label for="">Maksud</label>
        <p>@maksud@</p>
    </div>
    <div class="form-group">
        <label for="">Tujuan</label>
        <p>@tujuan@</p>
    </div>
        
     <input type='hidden' name='stdoc' value='@stdoc@'>
     ${ElementModals.lingkup}
     ${ElementModals.pihak1}
     ${ElementModals.pihak2}
    `
    lingkup = new RuangLingkup();
    pihak1 = new PihakPertama('opdashboard.modals');
    pihak2 = new PihakKedua('opdashboard.modals');
    open(title='Tambahkan Nomor Dokumen',id,type='1',obj){
        const {document:{
            teruskanKeKabag:xurl
        }}=window.myUrl;
        let lingup = obj.data("lingkup");
        this.lingkup.arrLingkup=lingup;
        this.pihak1.pihakPertama=obj.data("pihak_pertama")
        this.pihak2.pihakKedua=obj.data("pihak_kedua")
        const url = xurl.replace(/(@op_doc@)/g,id)
        const modal = new Modals('',url,title);
        let obs = {
            '@tentang@':obj.data('tentang'),
            '@maksud@':obj.data('maksud'),
            '@stdoc@':type,
            '@tujuan@':obj.data('tujuan'),
        }
        modal.contents = this.formEl.replace(/(@stdoc@|@tentang@|@maksud@|@tujuan@)/g,match=>{
            return obs[match];
        });
        modal.openModal(()=>{
            this.lingkup.render(()=>{
               
                $("a[name='a_tinggi']").hide();
                this.pihak1.renderHak();
                this.pihak1.renderKewajiban();
                this.pihak2.renderHak();
                this.pihak2.renderKewajiban();
                if(type=='2'){
                    $("input[name='nomor']").attr('readonly',false);
                }else {
                    $("[x='tbl']").hide();
                   $("input[name='nomor']").val(obj.data("nomor"));
                   $("input[name='nomor']").attr('readonly',true);
                }
            });
        },true);
    }
}