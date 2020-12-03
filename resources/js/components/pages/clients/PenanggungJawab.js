
import Modals from '../../../scripts/Modals';
import CreateDataTable from '../../../scripts/DataTable';
import PDFUploader from '../../../scripts/FileUploader';
import MyAjax from '../../../scripts/Ajax';
import Alert from '../../../scripts/Alert';


export default class PenanggungJawab{
    user_id=0;
    form=
    `
    <div class="form-group">
        <label for="jabatan">Jabatan</label>
        <input type="text" id="jabatan"  onchange="window.pJawab.setModel($(this).val(),'jabatan')" class="form-control" name="jabatan">
    </div>

    <div class="form-group">
        <label for="nomor_sk_jabatan">No. SK</label>
        <input type="text" id="nomor_sk_jabatan" class="form-control" onchange="window.pJawab.setModel($(this).val(),'nomor_sk_jabatan')" name="nomor_sk_jabatan">
    </div>
    <div class='form-group'>
        <div class='text-right'>
            <a class='btn btn-sm bg-blue' href='#' onclick='window.pJawab.save()' id='simpan-btn'>Simpan</a>
        </div> 

    </div>
    `
    model={'file_sk':'',jabatan:'',nomor_sk_jabatan:'',file_sk_jabatan:'sk_jabatan/',user_id:'',perusahaan_id:''}
    resetForm=
    `
    <a class='btn btn-link' onclick='window.pJawab.addNew()' href='#'>Tambah Penanggung Jawab</a>
    `
    formUpSK=
    `
    <div class='container-fluid'>
        <div class="form-group col-12">
            <label for="nomor_sk_jabatan">No. SK. Jabatan</label>
            : @nomor_sk_jabatan@<br>
            <input type='hidden' id='file_sk' >
            <input type='file' onchange='window.pJawab.upload($(this),$("#file_sk"))'>
        </div>
        <div class='form-group col-12'>
            <div class='text-right'>
                <a id='btn-upload' class='btn btn-primary btn-sm' href='#' onclick='window.pJawab.sendUpload()'>
                    Upload
                </a>
            </div>
        </div>
    </div>
    `
    perusahaan_id=0;
    columns = [
        {name:"jabatan",data:'jabatan'},
        {name:"nomor_sk_jabatan",data:'nomor_sk_jabatan'},
        {name:"aksi",data:'aksi'},
    ];
    table=undefined;
    id_penanggung='';
    jsonData = "";
    resetto(){
        this.initDataTable();    
        this.resetModel();
        $("#inputan-tj").hide(1000);
        $("#inputan-tj").html(this.resetForm);

    }
    addNew(){
        this.resetModel();
        let content = this.form;
        this.setContentForm(content);
    }
    openUploadForm(json){
        
        let jsons = json.replace(/&quot;/g,'"');
        
        jsons = JSON.parse(jsons);
        let content = this.formUpSK.replace(/(@nomor_sk_jabatan@)/g,jsons.nomor_sk_jabatan)
        this.id_penanggung = jsons.id;
        this.setContentForm(content);
        $('#btn-upload').hide(100);
    }
    setModel(value,type){
        this.model = {
            ...this.model,
            [type]:value,
        }
        //console.log('value',value,'type',type);
        
    }
    async sendUpload(){
        let url = myUrl.tanggungJawab.uploadSK.replace(/(@tj_id@)/g,this.id_penanggung);
        const axios  = new MyAjax(url,'POST');
        const {message} = await axios.send(this.model);
        const alr = new Alert();
        alr.swAlert(message,'Upload Data',()=>{
            this.resetto();
        })
    }
    async delete(json){
        let jsons = json.replace(/&quot;/g,'"');
        let parse = JSON.parse(jsons);
        const alert = new Alert();
        alert.swalYesNo(`Ingin Hapus Data ${parse.jabatan}?`,'Hapus',async()=>{
            try{
                let url = `${window.myUrl.tanggungJawab.dataTable}/${parse.id}`
                this.setModel('delete','_method');
                const ajax = new MyAjax(url,'POST');
                const {message} = await ajax.send(this.model)
                alert.swAlert(message,'Hapus',()=>{},'success');
            }catch(e){
                console.log(e);
                alert.swAlert('Gagal Menghapus Data','Galat',()=>{},'error');

            }
            

        })
    }
    async save(){
        const {store} = window.myUrl.tanggungJawab;
        let url = store;
        let model = {
            perusahaan_id:this.model.perusahaan_id,
            user_id:this.model.user_id,
            jabatan:this.model.jabatan,
            nomor_sk_jabatan:this.model.nomor_sk_jabatan,
            file_sk_jabatan:this.model.file_sk_jabatan,
            _token:$("input[name='_token']").val()
        }
        let vald = this.validasi(model);
        const alert = new Alert();
        if(vald){
            const axios  = new MyAjax(url,'POST');
            const {message} = await axios.send(this.model);
            alert.swAlert(message,"Berhasil",()=>{
                this.resetto();
            })
        }else{

            alert.swAlert('Masih ada Data yang Kosong','Galat',()=>{
                console.log(model)
            },'warning');
        }
    }

    validasi(__m={}){
        for(let i in __m){
            if(__m[i]===''||__m[i]==undefined){
                return false;
            }
        }
        return true;
    }
    
    upload(obj,objBase){
        new PDFUploader().upload(obj,objBase,()=>{
            $("#btn-upload").show(500);
            this.setModel($("#file_sk").val(),'file_sk');
            this.setModel($("input[name='_token']").val(),'_token');
            console.log(this.model);
        });
    }
    resetModel(){
        this.model={'file_sk':'',jabatan:'',nomor_sk_jabatan:'','file_sk_jabatan':'sk_jabatan/'}
        this.setModel(this.user_id,'user_id');
        this.setModel(this.perusahaan_id,'perusahaan_id');
    }
   
    async init(json=this.jsonData){
        let jsons = json.replace(/&quot;/g,'"');
        this.jsonData=jsons;
        jsons = JSON.parse(jsons);
        const {user_id,id}=jsons;
        this.perusahaan_id = id;
        this.user_id = user_id;
        await this.modalOpen()
        
    }
    async modalOpen(){
        let url= myUrl.tanggungJawab.open.replace(/(@pid@)/g,this.perusahaan_id)
        url=url.replace(/(@uid@)/g,this.user_id);
        let mModal = new Modals(url,'','Kelola Data Penanggung Jawab',false);
        await mModal.ajax()
        mModal.openModal(()=>{
            this.tableObj=$("#penanggungJawab");
                
            this.initDataTable();
            let content = this.resetForm;
            this.setContentForm(content);
        },true);
    }
    async openForm(){
        let obj = {
            pid:this.perusahaan_id,
            uid:this.user_id
        } 
        let content = this.form.replace(/(uid|pid)/gi,(result)=>{
            return obj[result]
        })
        this.setContentForm(content)
    }
    setContentForm(content=''){
        $("#inputan-tj").hide(100);
        $("#inputan-tj").html(content);
        $("#inputan-tj").show(500);

    }
    initDataTable(){
        const {tanggungJawab} = window.myUrl;
        let mapObj = {
            pid:this.perusahaan_id,
            uid:this.user_id,
        }
        let url = tanggungJawab.dataTable;
        if(this.table!=undefined){
            this.tableObj.dataTable().fnDestroy();
        }
        let amy = new CreateDataTable(this.tableObj);
        let ajax = amy.createAjaxParam(url,mapObj);
        amy.dataTable(this.columns,ajax);
        this.table=amy;

    }


}