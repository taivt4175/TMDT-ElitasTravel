function add_tourguide(){
    var formData = new FormData(document.querySelector('.signup-form'));
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../pscript/add_tourguide_event.php', true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            alert(xhr.responseText);
        }
    };
    xhr.send(formData);
}