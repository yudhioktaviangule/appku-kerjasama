import CreateDataTable from "../../../scripts/DataTable";

export default class Walikota {
    columns = [
        { name: "name", data: "name", orderable: false },
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
            "order": [[2, 'asc']],
        });
    }
}
