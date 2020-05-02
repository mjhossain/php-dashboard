var form = document.getElementById('login_form');





function validateLogin() {

    var login_userName = document.getElementById('username');
    var login_password = document.getElementById('password');
    var formMsg = document.getElementById('form-message');


    if (login_userName.value == '' || login_password.value == '') {



        if (login_userName.value == '' && login_password.value != '') {
            login_userName.classList.add('wrong-input');
            if (login_password.classList.contains('wrong-input')) {
                login_password.classList.remove('wrong-input');
            }
        } else if (login_password.value == '' && login_userName.value != '') {
            login_password.classList.add('wrong-input');
            if (login_userName.classList.contains('wrong-input')) {
                login_userName.classList.remove('wrong-input');
            }
        } else if (login_userName.value == '' || login_password.value == '') {
            login_userName.classList.add('wrong-input');
            login_password.classList.add('wrong-input');
        }

        return false;

    } else {
        return true;
    }
}





function validateRegistration() {

    var register_name = document.getElementById('fullname');
    var register_username = document.getElementById('username');
    var register_password = document.getElementById('password');
    var register_re_password = document.getElementById('re-password');

    var fullName = register_name.value;
    var username = register_username.value;
    var password = register_password.value;
    var rePassword = register_re_password.value;

    // check for empty values

    if (fullName == '' || username == '' || password == '' || rePassword == '') {
        if (fullName == '') {
            register_name.classList.add('wrong-input');
        } else {
            if (register_name.classList.contains('wrong-input')) {
                register_name.classList.remove('wrong-input');
            }
        }

        if (username == '') {
            register_username.classList.add('wrong-input');
        } else {
            if (register_username.classList.contains('wrong-input')) {
                register_username.classList.remove('wrong-input');
            }
        }

        if (password == '') {
            register_password.classList.add('wrong-input');
        } else {
            if (register_password.classList.contains('wrong-input')) {
                register_password.classList.remove('wrong-input');
            }
        }

        if (rePassword == '') {
            register_re_password.classList.add('wrong-input');
        } else {
            if (register_re_password.classList.contains('wrong-input')) {
                register_re_password.classList.remove('wrong-input');
            }
        }

        return false;
    } else {
        // check if password and re password does not match
        if (password != rePassword) {
            alert('Passwords do not match');
            return false;
        } else {
            check_Alpha(fullName);
            return true;
        }


    }

    // check if password and re password does not match




}


// Validation Helper Functions

function check_Zip(zipCode) {
    var regex = /^\d{5}$/;
    if (regex.test(zipCode) == false) {
        return false;
    }
    if (zipCode == " ") {
        return false;
    }
    return true;
}


function check_Alpha(letters) {
    console.log("Alpha Test");
    var regex = /^[a-zA-Z]+$/;
    if (regex.test(letters) == false) {

        return false;
    }
    if (letters == " ") {

        return false;
    }
    return true;
}

function check_phone(phone) {
    var regex = /^\(?\d{3}\)?-?\s*-?\d{4}$/;
    if (regex.test(phone)) {

        return true;
    } else {

        return false;
    }
}

function check_Email(mail) {
    var regex = /^(([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5}){1,25})+([;.](([a-zA-Z0-9_\-\.]+)@{[a-zA-Z0-9_\-\.]+0\.([a-zA-Z]{2,5}){1,25})+)*$/;
    if (regex.test(mail)) {
        return true;

    } else {

        return false;
    }
}