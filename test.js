function checkForm() {

    var invalid = 0;

    var name = document.getElementById('fullname');
    var username = document.getElementById('username');
    var password = document.getElementById('password');
    var repassword = document.getElementById('repassword');


    // Helper Texts
    var pwdHelper = document.getElementById('pwdHelper');
    var rePwdHelper = document.getElementById('rePwdHelper');
    var usernameHelper = document.getElementById('usernameHelper');



    // Testing name

    if (!(name.value.match(/^[A-Za-z\s]+$/)) || name == "") {
        invalid++;
        name.classList.add("wrong-input");
    } else {
        if (name.classList.contains("wrong-input")) {
            name.classList.remove("wrong-input");
        }
    }


    // Testing username

    if ((username.value.match(/\W/)) || username.value == "" || username.value.length < 8) {
        console.log(username.value);
        invalid++;
        username.classList.add("wrong-input");
        usernameHelper.classList.remove("hidden");
    } else {
        if (username.classList.contains("wrong-input")) {
            username.classList.remove("wrong-input");
            usernameHelper.classList.add("hidden");
        }
    }


    // Testing Password
    var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})");
    if (!(password.value.match(strongRegex)) || password.value == "" || password.value.length < 8) {
        invalid++;
        password.classList.add("wrong-input");
        pwdHelper.classList.remove('hidden');

    } else {
        if (password.classList.contains("wrong-input")) {
            password.classList.remove("wrong-input");
            pwdHelper.classList.add('hidden');
        }
    }

    if (repassword.value != password.value) {
        invalid++;
        repassword.classList.add("wrong-input");
        rePwdHelper.classList.remove("hidden");
    } else {
        if (repassword.classList.contains("wrong-input")) {
            repassword.classList.remove("wrong-input");
            rePwdHelper.classList.add("hidden");
        }
    }


    if (invalid == 0) {
        return true;
    } else {
        return false;
    }

}


function checkMemberAddForm() {

    var invalid = 0;

    var name = document.getElementById('name');
    var email = document.getElementById('email');
    var phone = document.getElementById('phone');
    var state = document.getElementById('state');
    var zip = document.getElementById('zip');
    var address = document.getElementById('address');



    // Testing name

    if (!(name.value.match(/^[A-Za-z\s]+$/)) || name == "") {
        invalid++;
        name.classList.add("wrong-input");
    } else {
        if (name.classList.contains("wrong-input")) {
            name.classList.remove("wrong-input");
        }
    }


    // Testing Email

    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if (!(email.value.match(emailPattern)) || email.value == "") {
        invalid++;
        email.classList.add("wrong-input");
    } else {
        if (email.classList.contains("wrong-input")) {
            email.classList.remove("wrong-input");
        }
    }


    // Testing Phone Number

    if (!(phone.value.match(/^\d+$/)) || phone.value == "") {
        invalid++;
        phone.classList.add("wrong-input");
    } else {
        if (phone.classList.contains("wrong-input")) {
            phone.classList.remove("wrong-input");
        }
    }


    // Testing Address

    if (!(address.value.match(/[a-zA-Z0-9]/g)) || address.value == "") {
        invalid++;
        address.classList.add("wrong-input");
    } else {
        if (address.classList.contains("wrong-input")) {
            address.classList.remove("wrong-input");
        }
    }


    // Testing State

    if (!(state.value.match(/[A-Z]/g)) || state.value == "" || state.value.length != 2) {
        invalid++;
        state.classList.add("wrong-input");
    } else {
        if (state.classList.contains("wrong-input")) {
            state.classList.remove("wrong-input");
        }
    }


    // Testing Zip Code

    if (!(zip.value.match(/^\d+$/)) || zip.value == "" || zip.value.length != 5) {
        invalid++;
        zip.classList.add("wrong-input");
    } else {
        if (zip.classList.contains("wrong-input")) {
            zip.classList.remove("wrong-input");
        }
    }


    if (invalid == 0) {
        return true;
    } else {
        return false;
    }
}