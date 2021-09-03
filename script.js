function triggerclick(){
    document.querySelector('file').click();
}

function displayimage(e){
    if(e.files[0]){
        var reader = new FileReader();
        reader.onload = function(e){
             document.querySelector('place').setAttribute('src',e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    }
}