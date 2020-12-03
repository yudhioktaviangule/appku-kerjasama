import axios from "axios";


export default class MyAjax{
    url='';
    type='';
    constructor(__url='',mType='POST'){
        this.url  = __url;
        this.type = mType;
    }

    async get(url=''){
        let param={
            headers:{
                Auth:`Bearer ${window.__token}`
            }
        }
        let result = await axios.get(url,param);
        return result;
    }
    async send(postData={}){
        const result = await axios({
            headers:{
                Auth:`Bearer ${window.__token}`
            },
            method:"POST",
            url:this.url,
            data:postData,
        });
        const {data} = result;
        return data;
    }

}
