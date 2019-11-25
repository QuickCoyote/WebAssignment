function login() {
    if (document.getElementById('username').value == "admin" && document.getElementById('password').value == "password") {
        console.log('succesful');
    } else {
        console.log('fail');
    }
    console.log(document.getElementById('username').value + " " + document.getElementById('password').value)
}