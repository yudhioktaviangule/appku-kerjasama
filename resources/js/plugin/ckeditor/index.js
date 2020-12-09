import './init';
import { configurate } from './init';

export default class CKeditor{
    ckeditor = CKEDITOR;
    konfigurasi(conf=''){
        configurate(conf);
    }

    ck(confy=''){
        this.konfigurasi(confy)
        return this;
    }
}
