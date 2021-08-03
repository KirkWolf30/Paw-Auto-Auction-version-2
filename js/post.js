function triggerClick(){
    document.querySelector('#profileImage').click();
}

function displayImage(e){
    if(e.files[0]){
        let reader = new FileReader();

        reader.onload = function(e){
            document.querySelector('#post_Display') .setAttribute('src', e.target.result);

        }

        reader.readAsDataURL(e.files[0]);
    }
}