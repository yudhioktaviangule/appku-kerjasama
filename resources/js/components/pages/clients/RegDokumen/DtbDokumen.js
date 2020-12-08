
import CreateDataTable from '../../../../scripts/DataTable';



export default class DtbDokumen{
    dom
    pj_id
    tbl
    columns = [
        {name:'nomor',data:'nomor'},
        {name:'perusahaan',data:'perusahaan'},
        {name:'tentang',data:'tentang'},
        {name:'tujuan',data:'tujuan'},
        {name:'aksi',data:'aksi'},
        {name:'keterangan',data:'keterangan'},
    ]
    constructor(dataTableDOM,penanggung_jawab_id){
     
        this.pj_id=penanggung_jawab_id;
        this.dom=dataTableDOM;
        
    }
    initDataTable(){
        console.log("initializeDataTable")
        const {dataTable} = myUrl.dokumen 
        let url = dataTable.replace(/(@pjid@)/g,this.pj_id)
        const xtable = new CreateDataTable(this.dom);
        const ajax = xtable.createAjaxParam(url);
        
        $("#table-walikota").show(1000);
        setTimeout(()=>{
            xtable.dataTable(this.columns,ajax);
        },1000)
        
    }

}