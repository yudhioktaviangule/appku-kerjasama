
import CreateDataTable from '../../../scripts/DataTable';
import Modals from '../../../scripts/Modals';
import PDFUploader from '../../../scripts/FileUploader';


class DashboardClient{

    user;
    table=[{name:'name',data:'name'},{name:'aksi',data:'aksi'}];
    swasta=`
        <div class="form-group">
            <label for="exampleInputEmail1">No. Ijin Usaha</label>
            <input required type="text" autocomplete=off class="form-control" name='nomor_ijin_usaha' id="exampleInputEmail1" placeholder="No. Izin Usaha">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">No. Akta Notaris</label>
            <input required type="text" autocomplete=off class="form-control" name='nomor_akta_notaris' id="exampleInputEmail1" placeholder="No. Akta Notaris">
        </div>
    `
    pemerintah=`
    <input required type="hidden" autocomplete=off value='internal' name='nomor_akta_notaris' id="exampleInputEmail1">
    <input required type="hidden" autocomplete=off value='internal' name='nomor_ijin_usaha' id="exampleInputEmail1">
    `
    dataTable = new CreateDataTable($("#table-perusahaan"));
    init(client){
        this.user=client;
        this.dataTableInit()
    }
    setInputan(obj){
        let val = obj.val();
        if(val.toLowerCase()==='swasta'){
            $("#tergantung-usaha").html(this.swasta);
        }else{
            $("#tergantung-usaha").html(this.pemerintah);
        }
    }
    dataTableInit(){
        let {index} = window.myUrl
        this.dataTable = new CreateDataTable($("#table-perusahaan"))
        let ajaxParam  =  this.dataTable.createAjaxParam(index,{uid:this.user});
        this.dataTable.dataTable(this.table,ajaxParam);
    }
    uploader(obj,objBase){
        new PDFUploader().upload(obj,objBase);
    }
    async addModal(){
        let my_url = window.myUrl;
        const modal = new Modals(my_url.create,my_url.store,'Tambah Perusahaanku',true);
        await modal.ajax()
        modal.openModal(()=>{
            $("#uid").val(this.user);
        },true)
    }
}

export default function DashClient(){
    return new DashboardClient();
}