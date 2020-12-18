
import CreateDataTable from '../../../../../scripts/DataTable';



export default class DataTableKonseptor{
    dom=$("#table-dokumen")
    constructor(){
        this.urls();
        this.init();
    }
    urls(){
        this.url={
            dataTable:()=>{
                const { table : { dt:url } } = window.myUrl;
                return url;
            }
        }
    }
    init(){
        console.log(this.url.dataTable());
        const dt = new CreateDataTable(this.dom);
        const cols = [
            {name:'nomor',data:'nomor'},
            {name:'instansi',data:'instansi'},
            {name:'tentang',data:'tentang'},
            {name:'dinas_tujuan',data:'dinas_tujuan'},
            {name:'aksi',data:'aksi'},

        ];
        const ajax = dt.createAjaxParam(this.url.dataTable());
        dt.dataTable(cols,ajax);
        
    }

}