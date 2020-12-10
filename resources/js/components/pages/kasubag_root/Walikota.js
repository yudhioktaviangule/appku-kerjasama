import CreateDataTable from "../../../scripts/DataTable";
import Modals from '../../../scripts/Modals';
import Alert from '../../../scripts/Alert';

export default class Walikota {
    columns = [
        { name: "name", data: "name", orderable: false },
        { name: "instansi", data: "instansi", orderable: false },
        { name: "jabatan", data: "jabatan", orderable: false },
        {
            name: "status_aktif",
            data: "status_aktif",
            orderable: false,
            searchable: false
        },
        { name: "aksi", data: "aksi", orderable: false, searchable: false }
    ];
    table = $("#table-walikota");
    init() {
        this.initDataTable();
    }

    initDataTable() {
        let tb = new CreateDataTable(this.table);
        const { table } = window.myUrl;
        const ajax = tb.createAjaxParam(table,{});
        tb.dataTable(this.columns,ajax,{
            "order": [[3, 'asc']],
        });
    }
    async edit(json){
        let jsons = json.replace(/&quot;/g,'"');
        jsons = JSON.parse(jsons);
        await this.addModal("Lihat Data PEJABAT",()=>{
            $("#name").val(jsons.name);
            $("#jabatan").val(jsons.jabatan);
            $("#aktif").val(jsons.aktif);
            const {ubah} = window.myUrl;
            const url = ubah.replace(/(@pejabat@)/g,jsons.id)
            $(".modal").attr('action',url);
            $("#tempat-put").html(`<put></put>`)
        })
    }

    delete(json){
        let jsons = json.replace(/&quot;/g,'"');
        jsons = JSON.parse(jsons);

        const alert = new Alert();
        const {hapus} = myUrl;
        const url = hapus.replace(/(@pejabat@)/g,jsons.id);
        alert.swalYesNo('Ingin Hapus data PEJABAT?','Hapus PEJABAT',()=>{
            $("#delete-form").attr("action",url);
            $("#delete-form").submit();
        })
    }
    set(json){
        let jsons = json.replace(/&quot;/g,'"');
        jsons = JSON.parse(jsons);

        const {ubah} = myUrl;
        let url = ubah.replace(/(@pejabat@)/g,jsons.id)
        const alert = new Alert();
        alert.swalYesNo(`Ingin Menonaktifkan ${jsons.name} dari data jabatan PEJABAT?`,'Ubah Status PEJABAT',()=>{
            window.location.href=url;
        })
    }
    setAktif(json){
        let jsons = json.replace(/&quot;/g,'"');
        jsons = JSON.parse(jsons);

        const {ubah} = myUrl;
        let url = ubah.replace(/(@pejabat@)/g,`${jsons.id}/edit`)
        const alert = new Alert();
        alert.swalYesNo(`Ingin Mengaktifkan ${jsons.name} dari data jabatan PEJABAT?`,'Ubah Status PEJABAT',()=>{
            window.location.href=url;
        })
    }
    async addModal(title='Tambah PEJABAT',onModalOpen=undefined){
        const {create,store} = window.myUrl; 
        const modal = new Modals(create,store,title,true);
        await modal.ajax();
        modal.openModal(()=>{
            
            if(onModalOpen!=undefined){
                onModalOpen()
            }else{
                $("#name").val("");
                $("#jabatan").val("WALIKOTA MAKASSAR");
                $("#aktif").val("1");
            }
        },false);
    }
}
