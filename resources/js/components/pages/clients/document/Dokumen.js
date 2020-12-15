
import DataTableDokumen from './components/DataTable';
import RoleClients from './components/RoleUser';
import FormDokumen from './components/Form';
import Alert from '../../../../scripts/Alert';
import RuangLingkupClient from '../lingkup/ClientRuangLingkup';

export default class Dokumen{
    id        = '';
    penanggungJawabId = '';
    dataTabel = new DataTableDokumen();
    role      = new RoleClients();
    form;
    constructor(user_id=''){
        console.log("initializing document...")
        if(user_id!=''){
            this.id        = user_id;
            this.dataTabel = new DataTableDokumen(this.id);
            this.role      = new RoleClients(this.id);
            this.dataTabel.init(this.id);
            this.rLingkup = new RuangLingkupClient();
        }
        
    }
    async setModal(){
        this.penanggungJawabId=this.role.penanggungJawabId;
        if(this.penanggungJawabId==''){
            this.createPesan(
                'Harap Pilih Role Terlebih Dahulu',
                'Galat',
                ()=>{return false},
                'error')
        }else{

            this.form=new FormDokumen(this.penanggungJawabId)
            await this.form.openModalAdd(()=>{
                return false;
            });
        }
    }
    createPesan(message,title,fun=()=>{},type){
        const pesan = new Alert();
        pesan.swAlert(message,title,fun,type)
    }
}