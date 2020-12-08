

export default class PihakKedua{
    formatList = `
        <li class="item">
            <span class="product-description">
                _NO_. _CONTENT_
                <a href="#" class="btn btn-sm btn-danger float-right" onclick='_FUNGSI_'>
                    <i class="fas fa-minus"></i>
                </a>
            </span>
        </li>    
    `
    
    obj={
        hak:'',
        kewajiban:'',
    }
    pihakKedua = {
        hak:[],
        kewajiban:[],
    }
    
    
    init(){
        this.obj.hak=$("#hak-p2");
    }

    
    hakFormat = {hak:""};
    kewajibanFormat = {kewajiban:""};
    
    addHak(textObj){
        let cval = textObj.val();
        if(cval==""){
            const pesan = new Alert();
            pesan.swAlert('Gagal Tambahkan data, Hak masih kosong','Hak Pihak Kedua',()=>{return},'error');
            return null
        }
        this.hakFormat={...this.hakFormat,hak:cval};
        this.pihakKedua.hak.push(this.hakFormat);
        this.renderHak()
        textObj.val("");
        console.log('adding Hak Pihak Kedua');
    }
    renderHak(){
        let html = '';
        let index = 0;
        for(let hak of this.pihakKedua.hak){
            const{hak:hakku}=hak;
            let fungsi = {
                _FUNGSI_:`window.register.pihak2.removeHak(${index})`,
                _NO_:index+1,
                _CONTENT_:hakku,
            };
            let flist = this.formatList.replace(/(_NO_|_CONTENT_|_FUNGSI_)/gi,match=>{
                return fungsi[match];
            })
            
            html+=flist;
            index++;
        }
        $("#hak-p2").html(html);
        $("#pihak-kedua").val(JSON.stringify(this.pihakKedua))
        window.register.validasi()
    }
    removeHak(index){
        this.pihakKedua.hak.splice(index,1);
        this.renderHak();
    }

    addKewajiban(textObj){
        let cval = textObj.val();
        if(cval==""){
            const pesan = new Alert();
            pesan.swAlert('Gagal Tambahkan data, Kewajiban masih kosong','Kewajiban Pihak Kedua',()=>{return},'error');
            return null
        }
        this.kewajibanFormat={...this.kewajibanFormat,kewajiban:cval};
        this.pihakKedua.kewajiban.push(this.kewajibanFormat);
        this.renderKewajiban()
        textObj.val("");
        console.log('adding Kewajiban Pihak Kedua');
    }
    renderKewajiban(){
        let html = '';
        let index = 0;
        for(let Kewajiban of this.pihakKedua.kewajiban){
            const{kewajiban:value}=Kewajiban;
            let fungsi = {
                _FUNGSI_:`window.register.pihak2.removeKewajiban(${index})`,
                _NO_:index+1,
                _CONTENT_:value,
            };
            let flist = this.formatList.replace(/(_NO_|_CONTENT_|_FUNGSI_)/gi,match=>{
                return fungsi[match];
            })
            
            html+=flist;
            index++;
        }
        $("#ls-kewajiban-2").html(html)
        $("#pihak-kedua").val(JSON.stringify(this.pihakKedua))
        window.register.validasi()
    }
    removeKewajiban(index){
        this.pihakKedua.kewajiban.splice(index,1);
        this.renderKewajiban();
    }    
}