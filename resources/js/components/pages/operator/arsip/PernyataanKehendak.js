
import CKeditor from '../../../../plugin/ckeditor/index';
import { Cformat } from './KehendakContentFormat/Kehendak';
import MyAjax from '../../../../scripts/Ajax';
import BulanName from '../../../../scripts/BLN';


export class PernyataanKehendak{
    document_id='';
    content=`
        <div class='form-group'>
            <textarea class='form-control' id='pern-kehendak-text'>_KONTEN_</textarea>
        </div>
    `;

    isikonten = Cformat
    
    constructor(id){
        this.document_id=id
    }
    async init(){
        this.setContent()
    }
    async setContent(){
        let konten = this.content.replace(/(_KONTEN_)/g,this.isikonten);
        konten =  await this.setFieldValue(konten)
        $("#body-content").html("");
        $("#body-content").html(konten);
        this.setTextEditor()
    }
    async setFieldValue(konten){
        const {sruce} = window.myUrl;
        const url = sruce.get.replace(/(@document@)/g,this.document_id)
        const ajax = new MyAjax(url,'GET')
        const result = await ajax.get(url);
        const {
            dokumen:{tentang:_TENTANG_},
            pejabat:{
                instansi:_INSTANSIPIHAK1_,
                jabatan:_JABATANPEJABAT_,
                name:_NAMAPEJABAT_
            },
            user_query:{
                user:{
                    name:_NAMAUSER_
                },
                jabatan:{
                    jabatan:_JABATANUSER_
                },
                perusahaan:{
                    name:_NAMAPERUSAHAAN_
                }

            },bulan:_BULAN_,tahun:_TAHUN_,tanggal:_TANGGAL_
        } = result.data
        console.log(result);
        const b = BulanName(_BULAN_);
        const objx = {
            _TENTANG_:_TENTANG_,
            _INSTANSIPIHAK1_:_INSTANSIPIHAK1_,
            _JABATANPEJABAT_:_JABATANPEJABAT_,
            _NAMAPEJABAT_:_NAMAPEJABAT_,
            _NAMAUSER_:_NAMAUSER_,
            _JABATANUSER_:_JABATANUSER_,
            _NAMAPERUSAHAAN_:_NAMAPERUSAHAAN_,
            _BULAN_:b,
            _TAHUN_:_TAHUN_,
            _TANGGAL_:_TANGGAL_,
        }
        const content = konten.replace(/_TENTANG_|_INSTANSIPIHAK1_|_JABATANPEJABAT_|_NAMAPEJABAT_|_NAMAUSER_|_JABATANUSER_|_NAMAPERUSAHAAN_|_BULAN_|_TAHUN_|_TANGGAL_/gi,match=>{
            return objx[match].toUpperCase();
        })
        return content;
        
    }
    setTextEditor(){
        let ck = new CKeditor();
        ck.ck('justify,textindent',1000)
        ck.ckeditor.replace('pern-kehendak-text');
    }
}