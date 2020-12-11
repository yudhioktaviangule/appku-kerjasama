
import MyAjax from '../../../../scripts/Ajax';
import { CONTENT, ITEM } from './KerjasamaContentFormat/Kjs';
import CKeditor from '../../../../plugin/ckeditor/index';


export default class Perjanjian{
    title='Perjanjian Kerjasama'
    document_id;

    constructor(doc=''){
        this.document_id=doc;
    }
    async init(){
        let konten=`
        <div class='form-group'>
            <textarea class='form-control' name='isi' id='janji'></textarea>
        </div>       
        `
        $("#body-content").html(konten);
        await this.getResource()
    }
    
    async getResource(){
        const {sruce:scure} = window.myUrl;
        let url = scure.get.replace(/(@document@)/g,this.document_id)+`?type=${this.title}`
        const ajax = new MyAjax(url);
        const res = await ajax.get(url)
        this.resultProcess(res);
    }
    resultProcess({data}){
        const {
            arsip:arsip,
            dokumen:{
                tentang:_TENTANG_,
                maksud:_MAKSUD_,
                tujuan:_TUJUAN_,
                lingkup:_LINGKUP_LIST_,
                pihak_pertama:PIHAK1,
                pihak_kedua:PIHAK2,
                pelaksanaan:_PELAKSANAAN_,
                ketentuan_umum:_KETENTUAN_UMUM_,
            },
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
        } = data;
        let content = '';
        let pihak1={
            hak:'',
            kewajiban:'',
        };
        let pihak2={
            hak:'',
            kewajiban:'',
        };
        let json;
        let lingkupList
        
        if(arsip==null){
            try{
                json=JSON.parse(PIHAK1);
                pihak1.hak=this.pihakContent(json,'hak');
                pihak1.kewajiban=this.pihakContent(json,'kewajiban');
                json=JSON.parse(PIHAK2);
                pihak2.hak = this.pihakContent(json,'hak');
                pihak2.kewajiban = this.pihakContent(json,'kewajiban');
                json={lingkup:JSON.parse(_LINGKUP_LIST_)}
                lingkupList = this.pihakContent(json,'lingkup')
                const objx = {
                    _TENTANG_:_TENTANG_,
                    _MAKSUD_:_MAKSUD_,
                    _TUJUAN_:_TUJUAN_,
                    _INSTANSI_:_INSTANSIPIHAK1_,
                    _JABPEJABAT_:_JABPEJABAT_,
                    _NAMAPEJABAT_:_NAMAPEJABAT_,
                    _NAMAUSER_:_NAMAUSER_,
                    _JABATANUSER_:_JABATANUSER_,
                    _PERUSAHAAN_:_PERUSAHAAN_,
                    _SK_:_SK_,
                    _KETENTUAN_UMUM_:_KETENTUAN_UMUM_,
                    _PELAKSANAAN_:_PELAKSANAAN_,
                    _LIST_LINGKUP_:lingkupList,
                    _HAK_PIHAK1_:pihak1.hak,
                    _KEWAJIBAN_PIHAK1_:pihak1.kewajiban,
                    _HAK_PIHAK2_:pihak2.hak,
                    _KEWAJIBAN_PIHAK2_:pihak2.kewajiban,
                }
                
                $("#janji").val(this.setContentEditor(objx))


            }catch(e){
                console.log(e);
            }
            
        }else{}
        let cke = new CKeditor();
        cke.ck("justify,textindent",1000);
        let {ckeditor} =cke;       
        ckeditor.replace('janji');
    }
    setContentEditor(objx){
        let k = [];
        for(let obj in objx){
            k.push(obj)
        }
        k=k.join("|");
        k=`${k}`;
        k=new RegExp(k,'gi');
        console.log('K',k);
        let kten = CONTENT;
        let contents = kten.replace(k,match=>{
            return objx[match]
        });
        console.log(contents);
        return contents;
    }
    pihakContent(json,key='hak'){
        let contents = json[key];
        let html='<ul>'
            for(let content of contents){
                html+=ITEM.replace(/(_ITEM_)/g,content[key]);
            }
        html+='</ul>'
        return html;
    }
}