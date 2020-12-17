
import Modals from '../../../../scripts/Modals';
import { ListFormat,ItemListFormat,CARD_FOOTER_FMT, ItemContent } from '../../formats/Lists/Lists';
import MyAjax from '../../../../scripts/Ajax';
import Alert from '../../../../scripts/Alert';
import DisableEnter from '../../../../scripts/FormInputDisable';


export default class HakDanKewajiban{
    dok_id=''
    list=[];
    async openModal(id=''){
        this.dok_id=id;
        await this.modals()
    }
    async modals(){
        const {hdank:{modals:url_tmp}} = window.myUrl;
        const url = url_tmp.replace(/(_DOC_)/g,this.dok_id)
        const modal = new Modals(url,'','Hak dan Kewajiban',false);
        await modal.ajax();
        modal.openModal(async ()=>{
            await this.process();
            DisableEnter();
            
            return null;
        },true)
    }
    async process(){
        const {hdank:{list}}=window.myUrl;
        let p1=ListFormat.replace(/(_JUDUL_|_WARNA_|_FOOTER_)/gi,match=>{
            const obj={
                _JUDUL_:"PIHAK PERTAMA",
                _WARNA_:"simelonecolor",
                _FOOTER_:'',
            }
            return obj[match];
        });
        let p2=ListFormat.replace(/(_JUDUL_|_WARNA_|_FOOTER_)/gi,match=>{
            const obj={
                _JUDUL_:"PIHAK KEDUA",
                _WARNA_:"simelonecolor",
                _FOOTER_:'',
            }
            return obj[match];
        });
        const ajax = new MyAjax();
        const url  = list.replace(/_DOC_/g,this.dok_id)
        const {data:{data:hasil}} = await ajax.get(url);
        this.list = hasil;
        
        this.draw(p1,p2)
    }
    async draw(pihak1=``,pihak2=``){
        let p1hak       = this.drawContent("Usulan Hak","","card-primary","pertama","hak",'hp1')
        let p1kewajiban = this.drawContent("Usulan Kewajiban","","card-primary","pertama","kewajiban",'kp1')
        let p1          = pihak1.replace(/_KONTEN_/g,`<br>${p1hak}<br>${p1kewajiban}`)
        let p2hak       = this.drawContent("Usulan Hak","","card-primary","kedua","hak",'hp2');
        let p2kwj       = this.drawContent("Usulan Kewajiban","","card-primary","kedua","kewajiban",'kp2');
        let p2          = pihak2.replace(/_KONTEN_/g,`<br>${p2hak}<br>${p2kwj}`)

        $("#hdk1").html(p1);
        $("#hdk2").html(p2);
        await this.disbtn();
    }
    createUrl(){
        this.url ={
            cekdok:()=>{
                const {dokumen:{lengkap:cekdok}}=window.myUrl;
                return cekdok.replace(/(_cekdok_)/g,this.dok_id);
            }
        } 
    }
    async disbtn(){
        this.createUrl();
        const ajax = new MyAjax(this.url.cekdok());
        const result = await ajax.get(this.url.cekdok());
        console.log(result);
        const {data:{dokumen:{status:status_doc}}} = result;
        if(status_doc!=='3'){
            
            $('button[name="bt-simpan"]').hide();
            $('div[name="foter"]').hide();
        }else{
            
            $('button[name="bt-simpan"]').show();
            $('div[name="foter"]').show();
        }
    }
    async hapus(id){
        let model={
            _method:"delete",
            _token:$("input[name='_token']").val()
        }
        const pesan = new Alert();
        pesan.swalYesNo("Ingin Menghapus Data?",`HAPUS ITEM`,async()=>{
            try{
    
                const {hdank:{delete:url_tmp}} = window.myUrl;
                const url = url_tmp.replace(/(_HAKAPI_)/g,id)
                const ajax= new MyAjax(url);
                await ajax.send(model);
                pesan.swAlert("Sukses Menghapus data","Sukses",()=>{return null},'success')
                this.process();
            }catch(e){
                pesan.swAlert("Gagal Menghapus data","Galat",()=>{return null},'error')
            }

        })
    }
    async save(value,jenis,pihak){
        const pesan = new Alert();
        const model={
            document_id:this.dok_id,
            nilai:value,
            pihak:pihak,
            jenis:jenis,
            _token:$("input[name='_token']").val()
        }
        try{

            const {hdank:{store:url_tmp}} = window.myUrl;
            const url   = url_tmp;
            const ajax  = new MyAjax(url);
            const {message:bodyPesan,title:head,icon:ikon} = await ajax.send(model);
            
            pesan.swAlert(bodyPesan,head,()=>{return null},ikon);
            this.process();
        }catch(e){
            pesan.swAlert("Gagal Menyimpan data","Galat",()=>{return null},'error')
            console.log(e);
        }

    }
    drawContent(judul,warna,clas,pihak,jenis,kode){
        
        let content = ListFormat.replace(/_JUDUL_|_WARNA_|_CLASS_/gi,match=>{
            const obj={
                _JUDUL_:judul,
                _WARNA_:warna,
                _CLASS_ :clas,
                
            }
            return obj[match];
        })
        let frmt = ItemListFormat;
        let html = '';
        let i =1;
        for(let lst of this.list){
            if(lst.pihak===pihak && lst.jenis==jenis){

                let fn   = `window.hdank.hapus(${lst.id})`;
            
                let fmtChild = ItemContent.replace(/(_ISFADE_|_NOMOR_|_NILAI_|_FNC_)/gi,match=>{
                    const obj={
                        _ISFADE_:lst.deleted==='2'||lst.deleted==='1' ? 'yud-hide':"",
                        _NOMOR_:i,
                        _NILAI_: lst.deleted==='2' ?`<s>${lst.nilai}</s>`:lst.nilai,
                        _FNC_:fn
                    };
                    return obj[match];
                }) 
                html+=fmtChild;
                i++;
            }
        }
        frmt=frmt.replace(/_KONTEN_/g,html);
        content = content.replace(/(_KONTEN_|_FOOTER_)/gi,match=>{
            let foot = CARD_FOOTER_FMT.replace(/(_IDOBJECT_|_FNC_|_PLACEHOLDER_|_BTNCAPS_)/gi,match_ft=>{
                const obj={
                    _IDOBJECT_:`${kode}`,
                    _PLACEHOLDER_:`MASUKKAN ${jenis.toUpperCase()} PIHAK ${pihak.toUpperCase()}`,
                    _BTNCAPS_:`Kirim`,
                    _FNC_:`window.hdank.save($('#${kode}').val(),'${jenis}','${pihak}')`
                }
                return obj[match_ft];
            })
            let obj={
                _KONTEN_:`${frmt}`,
                _FOOTER_:foot
            }
            return obj[match];
        })
        return content;
    }
}