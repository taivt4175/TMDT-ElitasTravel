function sign_up() {
    var name = document.querySelector('.input-signup-name').value;
    var day = document.querySelector('#day').value;
    var month = document.querySelector('#month').value;
    var year = document.querySelector('#year').value;
    var gender = document.querySelector('input[name="gender"]:checked').value;
    var email = document.querySelector('.email').value;
    var tel = document.querySelector('.input-signup-phone').value;
    var password = document.querySelector('.input-signup-password').value;
    var cfPassword = document.querySelector('.input-signup-password').value;
    var daybirth = year + '-' + month + '-' + day;

    // Tạo một mảng data chứa các giá trị
    var data = {
        name: name,
        daybirth: daybirth,
        gender: gender,
        email: email,
        tel: tel,
        password: password,
        cfPassword: cfPassword
    };

    alert(data);
    // Gửi request đến server
    fetch('../pscript/signup_event.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    })
        .then(response => response.text())
        .then(data => {
            alert(data);
        })
        .catch((error) => {
            console.error('Error:', error);
        });

}