

export default class PihakKedua{
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
            html+=`<tr><td>${index+1}. ${hakku} <a href='#' class='text-danger' onclick='window.register.pihak2.removeHak(${index})'>Hapus</a></td></tr>`;
            index++;
        }
        $("#hak-p2").html(html);
        $("#pihak-kedua").val(JSON.stringify(this.pihakKedua))
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
            html+=`<tr><td>${index+1}. ${value} <a href='#' class='text-danger' onclick='window.register.pihak2.removeKewajiban(${index})'>Hapus</a></td></tr>`;
            index++;
        }
        $("#ls-kewajiban-2").html(html);
        $("#pihak-kedua").val(JSON.stringify(this.pihakKedua))
    }
    removeKewajiban(index){
        this.pihakKedua.kewajiban.splice(index,1);
        this.renderKewajiban();
    }    
}