
import MyAjax from '../../../scripts/Ajax';
import CreateDataTable from '../../../scripts/DataTable';
import DtbDokumen from './RegDokumen/DtbDokumen';
import FormDokumen from './RegDokumen/FormDokumen';
import RuangLingkup from './RegDokumen/RuangLingkup';
import PihakPertama from './RegDokumen/PihakPertama';
import PihakKedua from './RegDokumen/PihakKedua';
import Alert from '../../../scripts/Alert';



export default class RegisterDokumen{
    showing=false;
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
    penanggungJawab = null;
    init(user_id){
        this.user=user_id;
        this.getPerusahaan();
        this.initDataTable();
        this.showing=false;

    }
    enableSearch(){
        $("#btn-cari").show(400)
        $("#btn-cari").show(400)
    }

    setPenanggungJawab(){
        this.penanggungJawab = $("#penanggung_jawab_id").val();
        this.roleCaption();
        
    }
    roleCaption(){
        try{
            let perrCap=$("#cb-perusahaan option:selected").text();
            let perrcl=$("#penanggung_jawab_id option:selected").text();
            $("#role-pr").html(`<strong>Role</strong>: ${perrcl}, ${perrCap}`);
            $("#mcontent-card").addClass("collapsed-card")
            
        }catch(e){

        }
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
        new DtbDokumen($("#table-dokumen"),this.user).initDataTable();
    }
    renderAll(){
        this.lingkup.render();
        this.pihak1.renderHak();
        this.pihak1.renderKewajiban();
        this.pihak2.renderHak();
        this.pihak2.renderKewajiban();
    }
    validasi(){
        const objForm = {
            tentang:{obj:'#tentang'},
            maksud:{obj:'#maksud'},
            tujuan:{obj:'#tujuan'},
            lingkup:{obj:"input[name='lingkup']"},
            pihak_pertama:{obj:"input[name='pihak_pertama']"},
            pihak_kedua:{obj:"input[name='pihak_kedua']"},
        }
        let validasi = true;
        for(let form in objForm){
            let value = $(form).val(); 
            if(value===''||value===null||value===undefined){
                validasi=false;
            }
        }
        if(validasi){
            $("#mdl-save").hide();
        }else{
            $("#mdl-save").show();

        }
    }
    async addModal(){
        const pesan=new Alert()
        if(this.penanggungJawab!=null){
            const dokumen =  new FormDokumen().init(this.penanggungJawab);
            this.form = await dokumen.loadForm("Register Dokumen",()=>{
                if(!this.showing){
                    this.renderAll()
                    this.showing=true
                }
            })

        }else{
            pesan.swAlert('Pilih Role Terlebih dahulu','Role Error',()=>{
                return
            },"error")
        }
       
    }

}