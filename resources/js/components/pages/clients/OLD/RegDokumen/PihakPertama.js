

export default class PihakPertama{
    rgs = 'register'
    
    formatList = `
        <li class="item">
            <span class="product-description">
                _NO_. _CONTENT_
                <a href="#" x='tbl' class="btn btn-sm btn-danger float-right" onclick='_FUNGSI_'>
                    <i class="fas fa-minus"></i>
                </a>
            </span>
        </li>    
    `
    obj={
        hak:'',
        kewajiban:'',
    }
    pihakPertama = {
        hak:[],
        kewajiban:[],
    }
    
    init(type='register'){
        this.obj.hak=$("#list-hak-pihak-pertama");
    }
    constructor(rtype='register',pp=true){
        this.rgs=rtype;
        if(pp){
            this.formatList = `
            <li class="item">
                <span class="product-description">
                    _NO_. _CONTENT_
                    <a href="#" x='tbl' class="btn btn-sm btn-danger float-right" onclick='_FUNGSI_'>
                        <i class="fas fa-minus"></i>
                    </a>
                </span>
            </li>    
        `
        }else{
            this.formatList = `
            <li class="item">
                <span class="product-description">
                    _NO_. _CONTENT_
                    
                </span>
            </li>    
        `
        }
    }
    
    hakFormat = {hak:""};
    kewajibanFormat = {kewajiban:""};
    
    addHak(textObj){
        let cval = textObj.val();
        if(cval==""){
            const pesan = new Alert();
            pesan.swAlert('Gagal Tambahkan data, Hak masih kosong','Hak Pihak Pertama',()=>{return},'error');
            return null
        }
        this.hakFormat={...this.hakFormat,hak:cval};
        this.pihakPertama.hak.push(this.hakFormat);
        this.renderHak()
        textObj.val("");
        console.log('adding Hak Pihak Pertama');
    }
    renderHak(){
        
        let html = '';
        let index = 0;
        for(let hak of this.pihakPertama.hak){
            const{hak:hakku}=hak;
            let fungsi = {
                _FUNGSI_:`window.${this.rgs}.pihak1.removeHak(${index})`,
                _NO_:index+1,
                _CONTENT_:hakku,
            };
            let flist = this.formatList.replace(/(_NO_|_CONTENT_|_FUNGSI_)/gi,match=>{
                return fungsi[match];
            })
            
            html+=flist;
            index++;
        }
        $("#list-hak-pihak-pertama").html(html);
        $("#pihak-pertama").val(JSON.stringify(this.pihakPertama))
        try{

            window.register.validasi();
        }catch(e){

        }
    }
    removeHak(index){
        this.pihakPertama.hak.splice(index,1);
        this.renderHak();
    }

    addKewajiban(textObj){
        let cval = textObj.val();
        if(cval==""){
            const pesan = new Alert();
            pesan.swAlert('Gagal Tambahkan data, Kewajiban masih kosong','Kewajiban pihak Pertama',()=>{return},'error');
            return null
        }
        this.kewajibanFormat={...this.kewajibanFormat,kewajiban:cval};
        this.pihakPertama.kewajiban.push(this.kewajibanFormat);
        this.renderKewajiban()
        textObj.val("");
        console.log('adding Kewajiban pihak Pertama');
    }
    renderKewajiban(){
        let html = '';
        let index = 0;
        for(let Kewajiban of this.pihakPertama.kewajiban){
            const{kewajiban:kewajibanku}=Kewajiban;
            let fungsi = {
                _FUNGSI_:`window.${this.rgs}.pihak1.removeKewajiban(${index})`,
                _NO_:index+1,
                _CONTENT_:kewajibanku,
            };
            let flist = this.formatList.replace(/(_NO_|_CONTENT_|_FUNGSI_)/gi,match=>{
                return fungsi[match];
            })
            
            html+=flist;
            index++;
        }
        $("#list-kewajiban-pihak-pertama").html(html);
        $("#pihak-pertama").val(JSON.stringify(this.pihakPertama))
        try{

        }catch(e){

            window.register.validasi();
        }
    }
    removeKewajiban(index){
        this.pihakPertama.kewajiban.splice(index,1);
        this.renderKewajiban();
    }    
}