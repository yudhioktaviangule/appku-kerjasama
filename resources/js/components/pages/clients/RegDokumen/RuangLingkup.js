
import Alert from '../../../../scripts/Alert';

export default class RuangLingkup{
    arrLingkup=[]
    lingkupFormat = {lingkup:""};
    add(textObj){
        let cval = textObj.val();
        if(cval==""){
            const pesan = new Alert();
            pesan.swAlert('Gagal Tambahkan data, Ruang Lingkup masih kosong','Lingkup',()=>{return},'error');
            return null
        }
        this.lingkupFormat={...this.lingkupFormat,lingkup:cval};
        this.arrLingkup.push(this.lingkupFormat);
        this.render()
        textObj.val("");
        console.log('adding ruang lingkup');
    }
    render(){
        let html = '';
        let index = 0;
        for(let lingkup of this.arrLingkup){
            const{lingkup:ruang}=lingkup;
            html+=`<tr><td>${index+1}. ${ruang} <a href='#' class='text-danger' onclick='window.register.lingkup.remove(${index})'>Hapus</a></td></tr>`;
            index++;
        }
        $("#list-lingkup").html(html);
        $("#jumlah-lingkup").html(this.arrLingkup.length);
        $("#lingkup-json").val(JSON.stringify(this.arrLingkup))
    }
    remove(index){
        this.arrLingkup.splice(index,1);
        this.render();
    }
    capLihat(obj){
        const val = obj.html()
        const objNext = obj.attr("href");
        const cClass  = $(objNext).attr("class");
        console.log('cClass', cClass)
        let tutup     = cClass.toLowerCase()==='collapse show';
        if(!tutup){
            obj.html(`<i class='fas fa-times'></i> Close`)
        }else{
            obj.html(`<i class='fas fa-eye'></i> Lihat`)
        }
    }
}