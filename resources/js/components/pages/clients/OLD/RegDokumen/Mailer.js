
import MyAjax from '../../../../scripts/Ajax';



export default class MailDokumenDibuat{
    async send(document_id){
        const {
            mail:{berkasDibuat:mail}
        }= window.myUrl;
        const url = mail.replace(/(@doc@)/g,document_id);
        const ajax = new MyAjax(url,'GET');
        await ajax.get(url);
        console.log("mail has send");
        console.log("deleting session...");
        setTimeout(()=>{
            this.deleteSession();
        },1000)

    }
    deleteSession(){
        let storage = window.localStorage;
        storage.removeItem("mailing");
        console.log("session has been deleted!");
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