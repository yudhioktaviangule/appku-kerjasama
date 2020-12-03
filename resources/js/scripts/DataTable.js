export default class CreateDataTable{
    obj;
    constructor(object){
        this.obj=object;
    }

    dataTable(){
        console.log("creating datatable");
        $(this.obj).DataTable()
    }
}