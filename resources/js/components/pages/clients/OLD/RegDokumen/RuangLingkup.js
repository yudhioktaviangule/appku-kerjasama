
import Alert from '../../../../../scripts/Alert';

export default class RuangLingkup{
    arrLingkup=[]
    
    formatList = `
        <li class="item">
            <span class="product-description">
                _NO_. _CONTENT_
                <a x='tbl' href="#" name='a_tinggi' class="btn btn-sm btn-danger float-right" onclick='_FUNGSI_'>
                    <i class="fas fa-minus"></i>
                </a>
            </span>
        </li>    
    `
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
    render(onRender=()=>{
        return null;
    }){
        let html = '';
        let index = 0;
        for(let lingkup of this.arrLingkup){
            const{lingkup:hakku}=lingkup;
            let fungsi = {
                _FUNGSI_:`window.register.lingkup.remove(${index})`,
                _NO_:index+1,
                _CONTENT_:hakku,
            };
            let flist = this.formatList.replace(/(_NO_|_CONTENT_|_FUNGSI_)/gi,match=>{
                return fungsi[match];
            })
            
            html+=flist;
            index++;
        }
        $("#list-lingkup").html(html);
        $("#jumlah-lingkup").html(this.arrLingkup.length);
        $("#lingkup-json").val(JSON.stringify(this.arrLingkup))
        onRender();
        try{
            window.register.validasi();

        }catch(e){}
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