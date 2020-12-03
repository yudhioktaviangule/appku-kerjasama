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
                auth:window._token
            }
        }
        let result = await axios.get(url,param);
        return result;
    }

}
