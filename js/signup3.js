function sign_up() {
    var formData = new FormData(document.querySelector('.signup-form'));
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../pscript/signup_event.php', true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            alert(xhr.responseText);
            calladdCustomer();
        }
    };
    xhr.send(formData);
}