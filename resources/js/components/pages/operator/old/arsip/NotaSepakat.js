import { ITEM_LINGKUP, NOTA_EDITOR_CONTENT } from "./NotaKesepakatanFormat/Nota";
import BulanName from '../../../../scripts/BLN';
import MyAjax from '../../../../scripts/Ajax';
import CKeditor from '../../../../plugin/ckeditor/index';



export default class NotaKesepakatan{
    document_id='';
    judul="Nota Kesepakatan"
    content=`
        <div class='form-group'>
            <textarea class='form-control' name='isi' id='nota-sepakat'></textarea>
        </div>
    `;
    constructor(id=''){
        this.document_id=id;
    }
    
    async init(){
        let konten = NOTA_EDITOR_CONTENT;
        let listContent = ITEM_LINGKUP;
        $("#body-content").html(this.content);
        await this.getResource(konten)
    }
    async getResource(konten){
        const {sruce} = window.myUrl;
        const url = sruce.get.replace(/(@document@)/g,this.document_id)+"?type=Nota Kesepakatan"
        const ajax = new MyAjax(url,'GET')
        const result = await ajax.get(url);
        const {
            arsip:arsip,
            dokumen:{tentang:_TENTANG_,lingkup:_LINGKUP_LIST_},
            pejabat:{
                instansi:_INSTANSIPIHAK1_,
                jabatan:_JABPEJABAT_,
                name:_NAMAPEJABAT_
            },
            user_query:{
                user:{
                    name:_NAMAUSER_
                },
                jabatan:{
                    jabatan:_JABATANUSER_,
                    nomor_sk_jabatan:_SK_
                },
                perusahaan:{
                    name:_PERUSAHAAN_
                }

            },bulan:_BULAN_,tahun:_TAHUN_,tanggal:_TANGGAL_
        } = result.data
        let content ='';
        if(arsip==null){
            const b = BulanName(_BULAN_);
            const json = JSON.parse(_LINGKUP_LIST_)
            const lingkupList = this.parseLingkup(json)
            const objx = {
                _TENTANG_:_TENTANG_,
                _INSTANSI_:_INSTANSIPIHAK1_,
                _JABPEJABAT_:_JABPEJABAT_,
                _NAMAPEJABAT_:_NAMAPEJABAT_,
                _NAMAUSER_:_NAMAUSER_,
                _JABATANUSER_:_JABATANUSER_,
                _PERUSAHAAN_:_PERUSAHAAN_,
                _BULAN_:b,
                _TAHUN_:_TAHUN_,
                _TANGGAL_:_TANGGAL_,
                _LINGKUP_LIST_:lingkupList,
                _SK_:_SK_
            }
    
            content = konten.replace(/_SK_|_TENTANG_|_INSTANSI_|_JABPEJABAT_|_NAMAPEJABAT_|_NAMAUSER_|_JABATANUSER_|_PERUSAHAAN_|_LINGKUP_LIST_|_BULAN_|_TAHUN_|_TANGGAL_/gi,match=>{
                return objx[match].toUpperCase();
            })
            //content = konten;

        }else{
            content=arsip.isi
        }
        $("[name=isi]").val(content);
        this.setTextEditor();
        $("input[name='judul']").val('Nota Kesepakatan');
        $("input[name='document_id']").val(this.document_id);

    }
    parseLingkup(json){
        let html = `<ul>`;
        for(let lk of json){
            html+=ITEM_LINGKUP.replace(/(_LINGKUP_ITEM_)/g,lk.lingkup)
        }
        html+='</ul>';
        return html;
    }
    setTextEditor(){
        let ck = new CKeditor();
        ck.ck('justify,textindent',1000)
        ck.ckeditor.replace('nota-sepakat');
    }

}