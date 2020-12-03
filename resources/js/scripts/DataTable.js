export default class CreateDataTable{
    obj;
    constructor(object){
        this.obj=object;
    }

    dataTable(option={
        columns:[],
    }){
        console.log("creating datatable");
        $(this.obj).DataTable()
    }

    createAjaxParam(url='',data=''){
        return {
            ajax:{
                url:url,
                data:data,
                beforeSend:(xhr)=>{
                    xhr.setRequestHeader("Auth",`Bearer ${window.__token}`);
                }
            }
        }
    }
}