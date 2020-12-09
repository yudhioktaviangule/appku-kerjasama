import PDFUploader from './scripts/FileUploader';
import MainRouter from './components/Main';
import Alert from './scripts/Alert';
import './plugin/ckeditor/index'
window._ = require('lodash');


try {
    window.Popper = require('popper.js').default;
    
    $(document).ready(()=>{
        require("admin-lte/dist/js/adminlte");
        
        window.pdfUpload = new PDFUploader()
        window.APP = new MainRouter();
        window.swals = new Alert();

    })
    
} catch (e) {
    console.error('error bossku',e)
}


window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
