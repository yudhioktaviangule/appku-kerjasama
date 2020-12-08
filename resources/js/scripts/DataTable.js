
import setReqHead from './JqueryAjaxRequestHeader';

export default class CreateDataTable{
    obj;
    constructor(object){
        this.obj=object;
    }

    dataTable(cols,ajax,options={}){
        
        console.log("creating datatable");
      console.log("columns",cols);
        $(this.obj).DataTable({
            ...options,
            columns:cols,
            ajax:{...ajax.ajax,type:'GET'},
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
                    setReqHead(xhr)
                }
            }
        }
    }
}