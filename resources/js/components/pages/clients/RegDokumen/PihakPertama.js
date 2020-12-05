

export default class PihakPertama{
    obj={
        hak:'',
        kewajiban:'',
    }
    pihakPertama = {
        hak:[],
        kewajiban:[],
    }
    
    init(){
        this.obj.hak=$("#list-hak-pihak-pertama");
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
            html+=`<tr><td>${index+1}. ${hakku} <a href='#' class='text-danger' onclick='window.register.pihak1.removeHak(${index})'>Hapus</a></td></tr>`;
            index++;
        }
        $("#list-hak-pihak-pertama").html(html);
        $("#pihak-pertama").val(JSON.stringify(this.pihakPertama))
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
            const{kewajiban:value}=Kewajiban;
            html+=`<tr><td>${index+1}. ${value} <a href='#' class='text-danger' onclick='window.register.pihak1.removeKewajiban(${index})'>Hapus</a></td></tr>`;
            index++;
        }
        $("#list-kewajiban-pihak-pertama").html(html);
        $("#pihak-pertama").val(JSON.stringify(this.pihakPertama))
    }
    removeKewajiban(index){
        this.pihakPertama.kewajiban.splice(index,1);
        this.renderKewajiban();
    }    
}