
import CreateDataTable from '../../../scripts/DataTable';
import Modals from '../../../scripts/Modals';
import PDFUploader from '../../../scripts/FileUploader';


class DashboardClient{
    user;
    table=[{name:'name',data:'name'},{name:'aksi',data:'aksi'}];
    dataTable = new CreateDataTable($("#table-perusahaan"));
    init(client){
        this.user=client;
        this.dataTableInit()
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
        const modal = new Modals(my_url.create,'','Tambah Perusahaanku',true);
        await modal.ajax()
        modal.openModal(()=>{

        })
    }
}

export default function DashClient(){
    return new DashboardClient();
}