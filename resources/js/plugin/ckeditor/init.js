
export function configurate(extraPlugins='',height=0){
    CKEDITOR.config.extraPlugins=extraPlugins;
    if(height!==0){
        CKEDITOR.config.height=height
    }
}