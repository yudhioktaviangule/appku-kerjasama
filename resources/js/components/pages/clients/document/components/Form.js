import Modals from "../../../../../scripts/Modals";
import { SelectDua } from "../../../../../scripts/SelectDua";
import CKeditor from '../../../../../plugin/ckeditor/index';

export default class FormDokumen {
    penanggunJawabId = 0;
    constructor(pen = 0) {
        if (pen != 0) {
            this.penanggunJawabId = pen;
        }
    }

    async openModalAdd(onShow = undefined) {
        const {
            dokumen: { create: urlGet, store: urlAction }
        } = myUrl;
        const modal = new Modals(
            urlGet,
            urlAction,
            "Register Dokumen Baru",
            true
        );
        await modal.ajax();
        modal.openModal(async () => {
            await this.select2ku();
            $("#pjid").html(`
                <input type='hidden' name='penanggung_jawab_id' value="${this.penanggunJawabId}"/>
            `);
            this.initCKE();
            return false;
        }, true);
    }
    initCKE() {
        let obj = {
            pelaksanaan: "pelaksanaan",
            maksud: "maksud_tujuan",
            ketentuan: "ketentuan_umum",
        };
        
        let editor= new CKeditor();
        
        editor.ck('justify,textindent');
        let exeditor = editor.ckeditor;
        for(let o in obj){
            let m = obj[o];
            $(`#${m}`).val(`<div style='margin:1.5em'><p></p></div>`)
            exeditor.replace(m);
        }
    }
    async select2ku() {
        let obj = $("#dinas-tujuan");
        let sel = new SelectDua();
        const {
            dinas: { select2: urlDinas }
        } = myUrl;
        sel.createAJax(urlDinas);
        sel.setObject(obj);
        sel.selectDua();
    }
}
