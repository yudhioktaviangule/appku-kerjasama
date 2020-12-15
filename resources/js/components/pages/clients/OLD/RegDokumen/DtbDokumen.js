
import CreateDataTable from '../../../../scripts/DataTable';
import { formatDataTable } from './Format';



export default class DtbDokumen{
    dom
    pj_id
    tbl
    columns = [
        {name:'nomor',data:'nomor'},
        {name:'perusahaan',data:'perusahaan'},
        {name:'tentang',data:'tentang'},
        {name:'maksud',data:'maksud',visible:false},
        {name:'tujuan',data:'tujuan',visible:false},
        {name:'status',data:'status'},
        {name:'keterangan',data:'keterangan',visible:false},
        {name:'aksi',class:          "details-control",
                orderable:      false,
                data:           null,
                defaultContent: `
                    <div class='text-right'>
                        <a class='btn btn-success btn-sm' name='lihat-detail'>Lihat</a>
                    </div>`},
    ]
    showDetail(object){

    }
    constructor(dataTableDOM,penanggung_jawab_id){
     
        this.pj_id=penanggung_jawab_id;
        this.dom=dataTableDOM;
        
    }
    initDataTable(){
        console.log("initializeDataTable")
        const {dataTable} = myUrl.dokumen 
        let url = dataTable.replace(/(@pjid@)/g,this.pj_id)
        const xtable = new CreateDataTable(this.dom);
        const ajax = xtable.createAjaxParam(url);
        
        $("#table-walikota").show(1000,()=>{
                
                let detailRows = [];
                this.tbl=xtable.dataTable(this.columns,ajax);
                $("#table-walikota tbody").on("click",'tr td a[name="lihat-detail"]',()=>{
                    const format = ( d ) =>{
                        //console.log('d',d);
                        /* const {maksud:_MAKSUD_,tujuan:_TUJUAN_,perusahaan:_PERUSAHAAN_} = d;
                        let obj = {
                            _MAKSUD_:_MAKSUD_,
                            _TUJUAN_:_TUJUAN_,
                            _PERUSAHAAN_:_PERUSAHAAN_,
                        }
                        let fmt = formatDataTable.replace(/(_PERUSAHAAN_|_MAKSUD_|_TUJUAN_)/gi,match=>{
                            return obj[match];
                        })
                        */
                       
                        let fmt=formatDataTable;
                        return fmt;
                    }
                    let tr = $(this).closest('tr');
                    
                    let row = this.tbl.row(tr);
                    
                    let idx = $.inArray(tr.attr('id'),detailRows);
                    
                    //console.log('row', row)
                   // console.log(row.data());
                    if(row.child.isShown()){
                        tr.removeClass('detail');
                        row.child.hide();
                        detailRows.splice(idx,1);
                    }else{
                        tr.addClass('detail');
                        row.child(format( row.data() )).show();
                        if ( idx === -1 ) {
                            detailRows.push( tr.attr('id') );
                        }
                        
                        
                    }
                })

                this.tbl.on('draw',()=>{
                    $.each( detailRows, function ( i, id ) {
                        $('#'+id+' td a[name="lihat-detail"]').trigger( 'click' );
                    } );
                })
            

        });
        
    }

}