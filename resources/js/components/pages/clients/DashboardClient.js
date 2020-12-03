
import CreateDataTable from '../../../scripts/DataTable';
import Modals from '../../../scripts/Modals';
import PDFUploader from '../../../scripts/FileUploader';


class DashboardClient{
    inputswasta=`            
        <div class="form-group">
            <label for="no_sk_jabatan">Akta Notaris</label>
            <input type="text" class="form-control" placeholder='Nomor Akta' id="no_sk_jabatan" name='nomor_akta'><br>
            <input type='file' placeholder='File ' onchange="window.dashboardClient.uploader($(this),$('#file_akta'))">
            <input type="hidden" id="file_akta" name='file_akta'>
        </div>
        <div class="form-group">
            <label for="no_sk_jabatan">Ijin Usaha</label>
            <input type="text" class="form-control" id="no_sk_jabatan" name='nomor_ijin_usaha' placeholder='No. Ijin Usaha'><br>
            <input type='file' placeholder='File ' onchange="window.dashboardClient.uploader($(this),$('#file_ijin'))">
            <input type="hidden" id="file_ijin" name='file_ijin'>
        </div>`;
    inputPemerintah = `
        <input type="hidden" name='nomor_ijin_usaha' value='instansi pemerintah'>
        <input type="hidden" name='nomor_akta_notaris' value='instansi pemerintah'>
        <input type="hidden" name='file_akta' value='instansi pemerintah'>
        <input type="hidden" name='file_ijin' value='instansi pemerintah'>
    `

    user;
    table=[{name:'name',data:'name'},{name:'aksi',data:'aksi'}];
    dataTable = new CreateDataTable($("#table-perusahaan"));
    init(client){
        this.user=client;
        this.dataTableInit()
    }
    setInputan(obj){
        let val = obj.val();
        if(val.toLowerCase()==='swasta'){
            $("#tergantung-usaha").html(this.inputswasta);
        }else{
            $("#tergantung-usaha").html(this.inputPemerintah);
        }
    }
    dataTableInit(){
        let {index} = window.myUrl
        this.dataTable = new CreateDataTable($("#table-perusahaan"))
        let ajaxParam  =  this.dataTable.createAjaxParam(index,{uid:this.user});
        this.dataTable.dataTable(this.table,ajaxParam);
    }
    uploader(obj,objBase){
        const pdf = new PDFUploader().upload(obj,objBase);
    }
    async addModal(){
        let my_url = window.myUrl;
        const modal = new Modals(my_url.create,my_url.store,'Tambah Perusahaanku',true);
        await modal.ajax()
        modal.openModal(()=>{

        },true)
    }
}

export default function DashClient(){
    return new DashboardClient();
}