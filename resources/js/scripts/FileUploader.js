import Alert from './Alert';

export default class PDFUploader{
    base64='';
    upload(obj,objBase64,onLoadFile=()=>{

    }){
        console.log('obj', obj)
        var selectedFile = obj[0].files;
        var size = obj[0].files[0].size
        console.log(selectedFile);
        let alert = new Alert();
        
        if(parseInt(size)>2000000){
            alert.swAlert('File Lebih Besar dari 2 MB','Upload Galat',()=>{},'error')
        }else{
            if (selectedFile.length > 0) {
                
                var __self = this;
                var fileToLoad = selectedFile[0];
                var fileReader = new FileReader();
                
                fileReader.onload = function(fileLoadedEvent) {
                    
                    __self.base64 = fileLoadedEvent.target.result;
                    console.log(objBase64);
                    $(objBase64).val(__self.base64);
                    onLoadFile();
                };
                fileReader.readAsDataURL(fileToLoad);
            } 
        }
    }
}