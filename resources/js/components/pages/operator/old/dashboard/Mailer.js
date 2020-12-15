
import MyAjax from '../../../../scripts/Ajax';


export default class MailToKasubag{
    
    async send(id){
        const {email:{sendKasubag:kdb}} = myUrl;
        const url = kdb.replace(/(@doc)/,id)
        const ajax = new MyAjax(url,'GET');
        console.log("sending email...")
        try{
            await ajax.get(url);
            
        }catch(e){
            console.log(e);
        }
        console.log("email has send")
        
    }
    async init(){
        try{
            console.log('mail initializing...');
            let storage = window.localStorage;
            let mail = storage.getItem("mailing");
            let json = this.convertDataToJSON(mail);
            console.log('mail sending...');
            await this.send(json.id);
        }catch(e){
            console.log(e);
        }
    }
    convertDataToJSON(data){
        try{
            let json = JSON.parse(data);
            return json;
        }catch(e){
            console.log("an error occured",e);
        }
    }
}