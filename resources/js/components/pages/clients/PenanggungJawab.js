export default class PenanggungJawab{
    user_id=0;
    perusahaan_id=0;
    columns = [
        {name:"jabatan",data:'jabatan'},
        {name:"nomor_sk_jabatan",data:'nomor_sk_jabatan'},
        {name:"aksi",data:'aksi'},
    ];
    init(json){
        let jsons = json.replace(/&quot;/g,'"');
        jsons = JSON.parse(jsons);
        
    }
}