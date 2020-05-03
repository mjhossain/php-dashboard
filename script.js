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

            var regex = /\W/g;
            if (regex.test(login_userName.value) == true) {
                login_userName.classList.add('wrong-input');
            } else if (login_userName.classList.contains('wrong-input')) {
                login_userName.classList.remove('wrong-input');
            }
        } else if (login_userName.value == '' || login_password.value == '') {
            login_userName.classList.add('wrong-input');
            login_password.classList.add('wrong-input');
        }

        return false;

    } else {

        var regex = /\W/g;
        if (regex.test(login_userName.value) == true) {
            login_userName.classList.add('wrong-input');
            return false;
        } else {
            return true;
        }


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


    if (fullName == '') {
        register_name.classList.add('wrong-input');
    } else {

        var regex = /^[a-zA-Z\s]+$/;
        if (regex.test(fullName) == false) {
            register_name.classList.add('wrong-input');
            return false;
        } else if (register_name.classList.contains('wrong-input')) {
            register_name.classList.remove('wrong-input');
        }
    }

    if (username == '') {
        register_username.classList.add('wrong-input');
        return false;
    } else {

        var regex = /\W/g;
        if (regex.test(username) == true || username.length < 8) {
            register_username.classList.add('wrong-input');
            return false;
        } else if (register_username.classList.contains('wrong-input')) {
            register_username.classList.remove('wrong-input');
        }
    }

    if (password == '') {
        register_password.classList.add('wrong-input');
        return false;
    } else {
        // Password Check

        var lowerCaseLetters = /[a-z]/g;
        if (password.match(lowerCaseLetters)) {
            if (register_password.classList.contains('wrong-input')) {
                register_password.classList.remove('wrong-input')
            }
        } else {
            letter.classList.add("wrong-input");
            return false;
        }

        // Validate capital letters
        var upperCaseLetters = /[A-Z]/g;
        if (password.match(upperCaseLetters)) {
            if (register_password.classList.contains('wrong-input')) {
                register_password.classList.remove('wrong-input')
            }
        } else {
            letter.classList.add("wrong-input");
            return false;
        }

        // Validate numbers
        var numbers = /[0-9]/g;
        if (password.match(numbers)) {
            if (register_password.classList.contains('wrong-input')) {
                register_password.classList.remove('wrong-input')
            }
        } else {
            letter.classList.add("wrong-input");
            return false;
        }

        // Validate length
        if (password.length >= 8) {
            if (register_password.classList.contains('wrong-input')) {
                register_password.classList.remove('wrong-input')
            }
        } else {
            letter.classList.add("wrong-input");
            return false;
        }


    }

    if (rePassword == '') {
        register_re_password.classList.add('wrong-input');
        return false;
    } else {
        if (register_re_password.classList.contains('wrong-input')) {
            register_re_password.classList.remove('wrong-input');
        }
    }



    // check if password and re password does not match
    // if (password != rePassword) {
    //     alert('Passwords do not match');
    //     return false;
    // } else {

    //     return true;
    // }


}