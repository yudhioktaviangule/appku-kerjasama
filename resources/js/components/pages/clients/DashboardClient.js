
import CreateDataTable from '../../../scripts/DataTable';
import Modals from '../../../scripts/Modals';
import PDFUploader from '../../../scripts/FileUploader';
import Alert from '../../../scripts/Alert';
import MyAjax from '../../../scripts/Ajax';


class DashboardClient{

    user;
    table=[{name:'name',data:'name'},{name:'aksi',data:'aksi'}];
    swasta=`
        <div class="form-group">
            <label for="exampleInputEmail1">No. Ijin Usaha</label>
            <input required type="text" autocomplete=off class="form-control" name='nomor_ijin_usaha' id="nomor_ijin_usaha" placeholder="No. Izin Usaha">
        </div>

        <div class="form-group">
            <label for="nomor_ijin_usaha">No. Akta Notaris</label>
            <input required type="text" autocomplete=off class="form-control" name='nomor_akta_notaris' id="nomor_akta_notaris" placeholder="No. Akta Notaris">
        </div>
    `
    pemerintah=`
    <input required type="hidden" id='nomor_akta_notaris' autocomplete=off value='internal' name='nomor_akta_notaris'>
    <input required type="hidden" id='nomor_ijin_usaha' autocomplete=off value='internal' name='nomor_ijin_usaha'>                

    `
    dataTable = new CreateDataTable($("#table-perusahaan"));
    async init(client){
        this.user=client;
        this.dataTableInit()
        await this.getCounts()
    }
    async getCounts(){
        let url=window.myUrl.count_per.replace(/(uid)/g,this.user);
        
        let ajax = new MyAjax(url);
        let {data} = await ajax.get(url);
        console.log(data);
        let count = parseInt(data.count);
        let interval = 0;
        let intva = setInterval(()=>{
            if(interval<=parseInt(count)){
                $("#cnt-perusahaan").html(interval);
                interval++;
            }else{
                clearInterval(intva);
            }
        },10);
    }
    setInputan(obj){
        let val = $(obj).val();
        if(val.toLowerCase()==='swasta'){
            $("#tergantung-usaha").html(this.swasta);
        }else{
            $("#tergantung-usaha").html(this.pemerintah);
        }
    }
    delete(json){
        let sqwal = new Alert();
        let url = window.myUrl.delete.replace(/(@perusahaan@)/g,json.id)
        $("#delete-form").attr("action",url);
        sqwal.swalYesNo("Yakin Menghapus Perusahaan?","Hapus Data",()=>{

        })
    }
    async registeredDocumentCount(){
        
    }
    async uploadAktaIjin(json,jenis='akta'){
        let jsons = json.replace(/&quot;/g,'"');
        jsons = JSON.parse(jsons);
        let url= '';
        let urlN= window.myUrl[jenis].store.replace(/(@p@)/g,jsons.id);
        if(jenis=='akta'){
            
            url=window.myUrl.uploadNotaris.replace(/(@perusahaan@)/g,jsons.id)
        }else{
            
            console.log(myUrl.uploadIjin);
            url=window.myUrl.uploadIjin.replace(/(@perusahaan@)/g,jsons.id)
        }
        const modals = new Modals(url,urlN,"Upload "+(jenis=='akta'?"Akta Notaris":"Izin Usaha"),false)
        await modals.ajax();
        modals.openModal(()=>{},false);
    }
    dataTableInit(){
        let {index} = window.myUrl
        this.dataTable = new CreateDataTable($("#table-perusahaan"))
        let ajaxParam  =  this.dataTable.createAjaxParam(index,{uid:this.user});
        this.dataTable.dataTable(this.table,ajaxParam);
    }
    uploader(obj,objBase){
        new PDFUploader().upload(obj,objBase,()=>{
            $("#mdl-save").show(500);
        });
    }
    async addModal(title='Tambah Perusahaanku',onshow=()=>{}){
        let my_url = window.myUrl;
        const modal = new Modals(my_url.create,my_url.store,title,true);
        await modal.ajax()
        modal.openModal(()=>{
            $("#uid").val(this.user);
            onshow()
        },true)
    }
    async tj(json){
        window.pJawab.init(json);
    }
    async edit(json){
        let jsons = json.replace(/&quot;/g,'"');
        jsons = JSON.parse(jsons);

        let url = myUrl.update.replace(/(@per@)/g,jsons.id)
        await this.addModal('Ubah Perusahaanku',()=>{
            $('#nama_perusahaan').val(jsons.name);
            $('#telepon_perusahaan').val(jsons.telepon);
            $('#jenis').val(jsons.jenis);
            this.setInputan($("#jenis"));
            $('#nomor_ijin_usaha').val(jsons.nomor_ijin_usaha);
            $('#nomor_akta_notaris').val(jsons.nomor_ijin_usaha);
            $('#email').val(jsons.email);
            $('#alamat').val(jsons.alamat);
            $("#skajab").html("");
            $("#method-put").html(`<put></put>`);
            $("#modals").attr('action',url);
        });
    }

    delete(json){
        let jsons = json.replace(/&quot;/g,'"');
        jsons = JSON.parse(jsons);
        const url = myUrl.delete.replace(/(@perusahaan@)/g,jsons.id);
        $("#delete-form").attr("action",url);
        let con = new Alert();
        con.swalYesNo("Hapus Data?","Hapus",()=>{
            $("#delete-form").submit();
        })
    }
}

export default function DashClient(){
    return new DashboardClient();
}