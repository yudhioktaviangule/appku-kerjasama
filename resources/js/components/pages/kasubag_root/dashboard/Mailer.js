
import MyAjax from '../../../../scripts/Ajax';


export default class MailerToHukum{
    async sendToHukum(id){
        const {email:{toHukum:kdb}} = myUrl;
        const url = kdb.replace(/(@doc@)/,id)
    const ajax = new MyAjax(url,'GET');
        console.log("sending email...")
        try{
            await ajax.get(url);
            
        }catch(e){
            console.log(e);
        }
        console.log("email has send")
        this.removeCache();
    }
    async sendToClient(id){
        const {email:{tolak:kdb}} = myUrl;
        const url = kdb.replace(/(@doc@)/,id)
        const ajax = new MyAjax(url,'GET');
        console.log("sending email...")
        try{
            await ajax.get(url);
            
        }catch(e){
            console.log(e);
        }
        console.log("email has send")
        this.removeCache();
    }
    removeCache(){
        const local = window.localStorage;
        local.removeItem("mailing");
    }
    async init(){
        try{
            console.log('mail initializing...');
            let storage = window.localStorage;
            let mail = storage.getItem("mailing");
            let json = this.convertDataToJSON(mail);
            console.log('mail sending...');
            switch(json.type){
                case 4:
                    this.sendToHukum(json.id)
                    break;
                case 6:
                    
                    break;
                default:
                    this.sendToClient(json.id)
                    break;
            }
            
        }catch(e){

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