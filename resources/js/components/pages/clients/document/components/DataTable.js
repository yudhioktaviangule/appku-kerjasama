import CreateDataTable from '../../../../../scripts/DataTable';


export default class DataTableDokumen {
    user = "";
    constructor(id = "") {
        this.user = id;
        if (id != ""||id!=undefined||id!=null) {
            this.init();
        }
    }

    init(user_id = "") {
        $(document).ready(()=>{
            const {dokumen:{dataTable:url_p}} = window.myUrl;
            console.log("initializing datatable...");
            this.user = user_id;
            
            this.dataTable(url_p);

        })
    }

    dataTable(dUrl) {
        try{
            if(this.user!=''){
                console.log(dUrl)
                const url = dUrl.replace(/(@uid)/,this.user);
                console.log(url);
                const obj = $("#table-dokumen");
                const col = [
                    {name:"nomor",data:"nomor"},
                    {name:"perusahaan",data:"perusahaan"},
                    {name:"tentang",data:"tentang"},
                    {name:"dinas_tujuan",data:"dinas_tujuan"},
                    {name:"status_str",data:"status_str"},
                    {name:"aksi",data:"aksi"},
                ];
                const dt   = new CreateDataTable(obj)
                const ajax = dt.createAjaxParam(url)
                dt.dataTable(col,ajax);
            }

        }
        catch(e){
    
        }
    }
}
