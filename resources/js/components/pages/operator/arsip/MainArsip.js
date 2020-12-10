import ArsipDataTable from "./ArsipDataTable";
import { PernyataanKehendak } from "./PernyataanKehendak";

export default class MainArsip {
    dataTable = new ArsipDataTable();
    pernyataanKehendak = new PernyataanKehendak();
    captionTitle = {
        normal: {
            head: "Pilih Dokumen",
            sub: "Pilih dokumen untuk dibuatkan Arsip"
        },
        kehendak: {
            head: "Pernyataan kehendak",
            sub: "No. Dokumen: _NOMOR_"
        }
    };
    init() {
        this.dataTable.init(this);
        this.setTitle();
        $("#kirim").hide(500);
    }

    submitForm(){
        $("#form-arsip").submit();
    }

    async setKehendak(document_id = "") {
        $("#kirim").show(500);
        this.pernyataanKehendak = new PernyataanKehendak(document_id);
        await this.pernyataanKehendak.init()
    }
    kirim(){

    }
    setTitle(type = "normal",nomorDocument='') {
        $("#p-title").html(this.captionTitle[type].head);
        let sub = this.captionTitle[type].sub;
        let subTitle = sub.replace(/(_NOMOR_)/g,nomorDocument);
        $("#sub-title").html(subTitle);
    }
    kehendakClick(object) {
        this.setTitle("kehendak",object.nomor);
        this.setKehendak(object.id);
    }
}