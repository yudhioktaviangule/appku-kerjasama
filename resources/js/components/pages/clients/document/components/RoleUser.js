
import { result } from 'lodash';
import MyAjax from '../../../../../scripts/Ajax';
import { Selects } from '../../../formats/role/FormatSelects';
import Alert from '../../../../../scripts/Alert';

export default class RoleClients{
    id='';
    penanggungJawabId='';
    constructor(user_id=''){
        this.id=user_id;
        if(user_id!=''){
            this.getPerusahaan();
            this.hideButton();
        }
    }
    async getPerusahaan(){

        const {getPerusahaan:url_p} = window.myUrl;
        const url = url_p.replace(/(@id)/g,this.id);
        const ajax = new MyAjax(url);
        const { data:result } = await ajax.get(url);
        this.olahData(result)
    }
    olahData(results){
        
        let html =`<option value=''>--PILIH PERUSAHAAN--</option>`;
        for(let result of results){
            //console.log(result);
            html+=`
                <option value='${result.id}'>${result.name}</option>
            `
        }
        
        $("#cb-perusahaan").html(html);
    }
    async chain(id){
        const {getChain:url_p} = window.myUrl;
        const url  = url_p.replace(/(@id)/g,id);
        const ajax = new MyAjax(url);
        const {data:results} = await ajax.get(url);
        this.chainRenderer(results)
    }
    chainRenderer(results){
        this.hideButton();
        let html =`<option value=''>--PILIH JABATAN PENANGGUNGJAWAB--</option>`;       
        for (const result of results) {
            html+=`
            <option value='${result.id}'>${result.jabatan}</option>
            `;
        }
        const obj = {
            _CAPTION_:"Penanggung Jawab",
            _DATA_:html,
            _OBJECTID_:'penanggung-jawab',
            _FUNGSI_:"window.dokumen.role.showButton()",
        }
        let format = Selects.replace(/(_CAPTION_|_DATA_|_OBJECTID_|_FUNGSI_)/gi,match=>{
            return obj[match];
        });

        $("#chain-child").html(format);

    }
    showButton(){
        $("#btn-cari").show(500)
    }
    hideButton(){
        $("#btn-cari").hide(500)
    }
    set(obj){
        
        const myAlert          = new Alert();
        let selIndex           = obj[0].selectedIndex
        let options            = obj[0].options
        
        let teks               = {
                                    role:options[selIndex].text,
                                    perusahaan:'',
                                };
                                
        let value              = $(obj[0]).val();
        selIndex = $("#cb-perusahaan")[0].selectedIndex;
        options = $("#cb-perusahaan")[0].options;
        teks = {
            ...teks,
            perusahaan:options[selIndex].text
        }

        $("#role-pr").html(
            `
                <strong>Role</strong> ${teks.role} ${teks.perusahaan} 
            `
        )
        this.penanggungJawabId = value;
        myAlert.swAlert(`Role Berhasil di set ke ${teks.role}`,'Set Role',()=>{return null;},'success');
    }
}