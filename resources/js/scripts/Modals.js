
import MyAjax from './Ajax';
export default class Modals{
    urlContents;
    urlActions;
    title='Belum ada Header';
    contents='';
    bt_save=true;
    constructor(urlGetContent='',urlAction='',title='',isSave=true){
        this.urlActions = urlAction;
        this.urlContents = urlGetContent;
        this.title = title;
        this.bt_save = isSave;
    }
    async ajax(){
        const asyncProcess = new MyAjax(this.urlContents,this.urlActions);
        let res = await asyncProcess.get(this.urlContents);
        this.contents = res.data;
        return this;
    }

    openModal(onShowModals=()=>{},isLg=false){

        $("#modals").modal('show');
        $("#mdl-title").html(this.title);
        $("#mdl-content").html(this.contents);
        $("#modals").attr('action',this.urlActions)
        
        if(isLg){
            $("#dialogue").attr("class",'modal-dialog modal-lg')
        }else{
            $("#dialogue").attr("class",'modal-dialog')
        }
        if(this.bt_save){
            $("#mdl-save").show();
        }else{
            $("#mdl-save").hide();
            
        }
        $("#modals").on("shown.bs.modal",function(){
            onShowModals();
            
        })
    }
}