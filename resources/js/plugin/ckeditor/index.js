import './init';
import { configurate } from './init';

export default class CKeditor{
    ckeditor = CKEDITOR;
    konfigurasi(conf='',height=0){
        configurate(conf,height);
    }

    ck(confy='',height=0){
        this.konfigurasi(confy,height)
        
        return this;
    }
}
