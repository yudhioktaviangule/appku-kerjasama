export default class PDFUploader{
    base64='';
    upload(obj,objBase64){
        console.log('obj', obj)
        var selectedFile = obj[0].files;
        console.log(selectedFile);
        if (selectedFile.length > 0) {
            var __self = this;
            var fileToLoad = selectedFile[0];
            var fileReader = new FileReader();
            
            fileReader.onload = function(fileLoadedEvent) {
                
                __self.base64 = fileLoadedEvent.target.result;
                console.log(objBase64);
                $(objBase64).val(__self.base64);
            };
            fileReader.readAsDataURL(fileToLoad);
        } 
    }
}