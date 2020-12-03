export default class CreateDataTable{
    obj;
    constructor(object){
        this.obj=object;
    }

    dataTable(cols,ajax){
        
        console.log("creating datatable");
        $(this.obj).DataTable({
            ...cols,
            ...ajax,
            language:{
                search:"Cari",
                loadingRecords:"Mengambil Data"
            }
        })
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