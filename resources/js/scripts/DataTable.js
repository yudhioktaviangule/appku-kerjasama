
import setReqHead from './JqueryAjaxRequestHeader';

export default class CreateDataTable{
    obj;
    constructor(object=$(".table")){
        this.obj=object;
    }

    dataTable(cols,ajax,options={}){
        
        console.log("creating datatable");
      console.log("columns",cols);
        let datatable = $(this.obj).DataTable({
            ...options,
            processing:true,
            serverSide:true,
            columns:cols,
            ajax:{...ajax.ajax,type:'GET'},
            language:{
                search:"Cari",
                loadingRecords:"Mengambil Data",
                processing:"Memproses",
                searchPlaceholder:"Cari data",
                emptyTable:"Tidak ada Entri data",
                
            }
        })
        datatable.draw();
        return datatable;
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