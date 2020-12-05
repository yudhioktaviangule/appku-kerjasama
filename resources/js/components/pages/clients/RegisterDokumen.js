
import MyAjax from '../../../scripts/Ajax';
import CreateDataTable from '../../../scripts/DataTable';
import DtbDokumen from './RegDokumen/DtbDokumen';
import FormDokumen from './RegDokumen/FormDokumen';
import RuangLingkup from './RegDokumen/RuangLingkup';
import PihakPertama from './RegDokumen/PihakPertama';
import PihakKedua from './RegDokumen/PihakKedua';



export default class RegisterDokumen{
    user;
    chainSelect=`
    <label for="">Penanggung Jawab</label>
    <select id="penanggung_jawab_id" onchange="window.register.enableSearch()" id="chain-child" class='form-control'>
        @rebuild
    </select>

    `
    lingkup = new RuangLingkup();
    pihak1 = new PihakPertama();
    pihak2 = new PihakKedua();
    form;
    penanggungJawab = '';
    init(user_id){
        this.user=user_id;
        this.getPerusahaan();
        $("#table-walikota").hide();
    }
    enableSearch(){
        $("#btn-cari").show(400)
        $("#btn-cari").show(400)
    }

    setPenanggungJawab(){
        this.penanggungJawab = $("#penanggung_jawab_id").val();
        this.initDataTable()
    }
    async getPerusahaan(){
        $("#btn-cari").hide();
        const { get } = window.myUrl.perusahaan;
        const axios = new MyAjax(get,'GET')
        const { data } = await axios.get(get);
        let html = `<option value=''></option>`;
        for(let d of data){
            html+=`
                <option value=${d.id}>${d.name}</option>
            `;
        }

        $("#cb-perusahaan").html(html);
    }

    async chainCombo(perusahaan_id){
        $("#btn-cari").hide();
        let obj = {
            pid:perusahaan_id,
            uid:this.user
        }
        const { get } = myUrl.pj;
        let url = get.replace(/(pid|uid)/gi,match=>{
            return obj[match];
        })
        const axios = new MyAjax(url,'GET');
        const {data} = await axios.get(url);
        let html = `<option></option>`;
        for(let x of data){
            html+=`
                <option value=${x.id}>${x.jabatan}</option>
            `;
        }
        let chsel = this.chainSelect.replace(/(@rebuild)/g,html)
        $("#chain-child").html(chsel);
        
    }
    initDataTable(){
        new DtbDokumen($("#table-dokumen"),this.penanggungJawab).initDataTable();
    }
    async addModal(){
       const dokumen =  new FormDokumen().init(this.penanggungJawab);
       this.form = await dokumen.loadForm("Register Dokumen",()=>{
           this.lingkup.render();
       })
       
    }

}