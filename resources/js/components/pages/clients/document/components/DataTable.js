




export default class DataTableDokumen{
    user='';
    constructor(id=''){
        this.user=id;
        if(id!=''){
            this.init();
        }
    }
    
    init(user_id=''){
    //    console.log('initializing datatable...');
        this.user=user_id;
    }
}