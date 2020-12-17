
import MyAjax from '../../../../../scripts/Ajax';
import { ListFormat, ItemListFormat, ItemContent,CARD_FOOTER_FMT } from '../../../formats/Lists/Lists';
import Alert from '../../../../../scripts/Alert';

export default class HakDanKewajiban{
    list=[];
    wrapperContent=``;
    ddocument_id = '';
    createUrl(id){
        this.url={
            list:()=>{
                const {hdank:{get:url_tmp}}=window.myUrl;
                return url_tmp.replace(/(_hdank_)/g,id);
            }
            ,
            store:()=>{
                const {hdank:{store:url_tmp}}=window.myUrl;
                return url_tmp;
            },
            
            delete:(idx)=>{
                const {hdank:{delete:url_tmp}}=window.myUrl;
                return url_tmp.replace(/(_hdank_)/g,idx);
            },
            cekdok:()=>{
                const {dash:{cekdok:url_tmp}}=window.myUrl;
                return url_tmp.replace(/(_cekdok_)/g,id);

            }

            
        }
    }
    async requery(id){
        
        //this.init(id,'requery by id = '+id);
        
        
    }
    async disableButton(id){
        this.createUrl(id);
        const ajax = new MyAjax(this.url.cekdok());
        const { data:{dokumen:{status:status_doc,}} } = await ajax.get(this.url.cekdok());
        let show = ['#btn-terusan','#btn-refresh'];
        
        if(parseInt(status_doc)>3){
            $("#btn-terusan").show(500);
            $("#btn-refresh").hide(500);
            $('[name="bt-simpan"]').hide();
            $('[name="foter"]').hide();
        }else{
            $("#btn-refresh").show(500);
            $("#btn-terusan").hide(500);
            $('[name="bt-simpan"]').show();
            $('[name="foter"]').show();
        }

        



        
    }
    async init(document_id,from='init'){
        
               
        this.ddocument_id = document_id;
        this.createUrl(document_id);
        const url         = this.url.list();
        const mAjax       = new MyAjax();
        const { data }    = await  mAjax.get(url)
        this.list         = data
        this.p1           = this.createWrapperContent("pertama");
        this.p2           = this.createWrapperContent("kedua");
        this.renderData();
        this.disableButton(document_id)  
    }
    renderData(){
        const html = `
            <div class='container-fluid'>
                <div class='row'>
                    <div class='col-6'>
                        ${this.p1}
                    </div>
                    <div class='col-6'>
                        ${this.p2}
                    </div>
                </div>
            </div>
        `;
        $("#hk-content").html(html);
    }
    
    async removeItem(id){
        const url_del = this.url.delete(id);
        let model = {
            _method:"delete",
            _token:$('[name="_token"]').val(),
        }
        let hapus = false;
        const pesan = new Alert();
        pesan.messageBebas({
            content:"Ingin Menghapus Secara Permanen?",
            title:'Hapus Data',
            onConfirm:()=>{
                console.log('confirm');
                model={
                    ...model,
                    permanent:true,
                }
                this.execAjax(url_del,model);
                return null;
            },
            onDeny:()=>{
                console.log('deny');
                this.execAjax(url_del,model);
                return null;
            },
            onCancel:()=>{
                console.log('cancel');
                return null;
            }
        });


    }
    async execAjax(url_del,model){
        let pesan = new Alert();
        const ajax = new MyAjax(url_del);
        const {message,isError} = await ajax.send(model);
        pesan.swAlert(message,isError?"GALAT":"Berhasil",()=>{
            this.init(this.ddocument_id);
            return null;
            
        },isError?"error":"success");

    }
    async add(value,jenis,pihak){
        const pesan = new Alert();
        if(value===''){
            pesan.swAlert("Maaf Tidak bisa Menambahkan data. isian masih kosong",'Galat',()=>{return null},'error')
            return null;
        }
        const model = {
            document_id:this.ddocument_id,
            nilai:value,
            jenis:jenis,
            pihak:pihak,
            _token:$('[name="_token"]').val(),
        }

        const ajax = new MyAjax(this.url.store());
        const {message,isError} = await ajax.send(model);
        pesan.swAlert(message,isError?"GALAT":"Berhasil",()=>{
            this.init(this.ddocument_id);
            return null;
            
        },isError?"error":"success");
    }
    createWrapperContent(pihak='pertama'){
        let fWrapper = ListFormat.replace(/(_KONTEN_|_CLASS_|_JUDUL_|_WARNA_|_FOOTER_)/gi,mtch=>{
            const sWrap = (iPihak,jenis,kode)=>{
                let WRAP_TOP = ListFormat.replace(/(_KONTEN_|_CLASS_|_JUDUL_|_WARNA_|_FOOTER_)/gi,mtch22=>{
                    
                    let listWrapper = ItemListFormat.replace(/(_KONTEN_)/g,()=>{
                        let html = ``;
                        let i =1;
                        for(let l of this.list){
                            if(l.pihak.toUpperCase()===iPihak.toUpperCase() && jenis===l.jenis){
                                html+=ItemContent.replace(/(_NOMOR_|_NILAI_|_FNC_|_ISFADE_)/gi,mtcdetcontent=>{
                                    let objdetContent = {
                                        _NOMOR_:i,
                                        _NILAI_:l.deleted==='2'?`<strike>${l.nilai}</strike> <i class='text-danger'>Dihapus oleh Kasubag</i>`:l.nilai,
                                        _FNC_:`window.nego.hdank.removeItem(${l.id})`,
                                        _ISFADE_:'',
        
                                    }
                                    return objdetContent[mtcdetcontent];
                                })
                                i++;
                            }
                        }
                        return html;
                    })
                    const ovjxx={
                        _CLASS_:"",
                        _JUDUL_:`USULAN ${jenis.toUpperCase()}`,
                        _WARNA_:"bg-info",
                        _FOOTER_:CARD_FOOTER_FMT.replace(/(_IDOBJECT_|_PLACEHOLDER_|_BTNCAPS_|_FNC_)/gi,(ftmt)=>{
                                let obj = {
                                    _IDOBJECT_:`${kode}`,
                                    _PLACEHOLDER_:`MASUKKAN ${jenis.toUpperCase()} PIHAK ${iPihak.toUpperCase()}`,
                                    _BTNCAPS_:"KIRIM",
                                    _FNC_:`window.nego.hdank.add($('#`+kode+`').val(),'${jenis}','${iPihak}')`
                                }
                                return obj[ftmt];
                        }),
                        _KONTEN_:`${listWrapper}`
                    }
                    return ovjxx[mtch22]
                })
                return WRAP_TOP;
            }

            const ovj={
                _CLASS_:"",
                _JUDUL_:`PIHAK ${pihak.toUpperCase()}`,
                _WARNA_:"bg-danger",
                _FOOTER_:"",
                _KONTEN_:`
                <br>
                <br>
                <div class='container-fluid'>
                    ${sWrap(pihak,'hak',`hk${pihak}`)}<br>
                    ${sWrap(pihak,'kewajiban',`kw${pihak}`)}
                </div>`,

            }
            return ovj[mtch];
        })
        
        return fWrapper;
    }
       
}