
import setReqHead from './JqueryAjaxRequestHeader';
export class SelectDua{
    ajax={
        type:'GET',
        beforeSend:(xhr)=>{
            setReqHead(xhr)
            xhr.setRequestHeader('Content-Type','application/json');
            xhr.setRequestHeader('Accept','application/json');
        }
    };
    dom=$(".select");
    createAJax(url){
        this.ajax={
            ...this.ajax,
            url:url
        }
    }
    setObject(__dom){
        this.dom=__dom;
        
    }
    selectDua(options){
        this.dom.select2({
            theme:'bootstrap4',
            ajax:this.ajax,...options
        })
    }
}