$(document).ready(function () {

    function error_alert(value) {
        $('#error').html(
            `<div class="alert alert-danger" role="alert"><strong><i class="fas fa-warning"></i></strong>&ensp;${value}</div>`
        );
    }

    $(document).on('keyup', function () {
        $('#error').html('');
    });

    $('#login').click(function () {
        if (
            $('#loginEmail').val() == '' ||
            $('#loginPassword').val() == ''
        ) {
            if ($('#loginEmail').val() == '') {
                error_alert('Email id Required');
            } else if ($('#loginPassword').val() == '') {
                error_alert('Password is Required');
            }
        } else {
            loginStudent();
        }

        function loginStudent() {
            var loginData = $('#loginDetails').serialize();
            $.ajax({
                type: 'POST',
                url: '../services/controllers/loginController.php',
                data: loginData,
                dataType: 'json',
                beforeSend: function () {
                    $('#login').html('Validating...');
                    $('#login').attr('disabled', true);
                },
                success: function (response) {
                    signInProcess(response.value);
                },
            }); // ends create ajax
        }

        function signInProcess(data) {
            var codeNo = '';
            var msgs = '';
            var tokenId = '';
            $.each(data, function (key, item) {
                codeNo = item.code;
                msgs = item.msgs;
                tokenId = item.token;
            });
            if (codeNo == "200") {
                $('#login').html('Connecting...');
                $('#login').attr('disabled', false);
                localStorage.setItem('token', tokenId);
                window.location.href = "../student/?pg=home";

            } else if (codeNo == "400") {
                $('#login').html('Login');
                $('#login').attr('disabled', false);
                error_alert(msgs);
            } else if (codeNo == "404") {
                $('#login').html('Login');
                $('#login').attr('disabled', false);
                error_alert(msgs);
            }
        }
    });



    $('#signup').click(function () {
        if (
            $('#firstName').val() == '' ||
            $('#lastName').val() == '' ||
            $('#emailAddress').val() == '' ||
            $('#password').val() == '' ||
            $('#password2').val() == '' ||
            $('#level').val() == '' ||
            $('#department').val() == ''
        ) {
            if ($('#firstName').val() == '') {
                error_alert('First Name is Required');
            } else if ($('#lastName').val() == '') {
                error_alert('Last Name is Required');
            } else if ($('#emailAddress').val() == '') {
                error_alert('Email Address is Required');
            } else if ($('#password').val() == '') {
                error_alert('Password is Required');
            } else if ($('#password2').val() == '') {
                error_alert('Confirm Password is Required');
            } else if ($('#level').val() == '') {
                error_alert('Level is Required');
            } else if ($('#department').val() == '') {
                error_alert('Department is Required');
            }
        } else {
            signUpStudent();
        }

        function signUpStudent() {
            var signUpData = $('#signupDetails').serialize();

            $.ajax({
                type: 'POST',
                url: '../services/controllers/signUpController.php',
                data: signUpData,
                dataType: 'json',
                beforeSend: function () {
                    $('#signup').html('validating....');
                    $('#signup').attr('disabled', true);
                },
                success: function (response) {
                    signUpProcess(response.value);
                },
            }); // signUp Ajax Ends
        } // ends signup function

        function signUpProcess(data) {
            var codeNo = '';
            var msgs = '';
            var tokenId = '';
            $.each(data, function (key, item) {
                codeNo = item.code;
                msgs = item.msgs;
                tokenId = item.token;
            });
            if (codeNo == "200") {
                $('#signup').html('Sign Up');
                $('#signup').attr('disabled', false);
                localStorage.setItem('token', tokenId);
                window.location.href = "../student/?pg=home";

            } else if (codeNo == "400") {
                $('#signup').html('Sign Up');
                $('#signup').attr('disabled', false);
                error_alert(msgs);
            } else if (codeNo == "404") {
                $('#signup').html('Sign Up');
                $('#signup').attr('disabled', false);
                error_alert(msgs);
            }
        }
    }); //onClick function ends


    $('#adminLogin').click(function () {
        if (
            $('#adminEmail').val() == '' ||
            $('#adminPassword').val() == ''
        ) {
            if ($('#adminEmail').val() == '') {
                error_alert('Email id Required');
            } else if ($('#adminPassword').val() == '') {
                error_alert('Password is Required');
            }
        } else {
            loginAdmin();
        }

        function loginAdmin() {
            var adminLoginData = $('#adminLoginDetails').serialize();
            $.ajax({
                type: 'POST',
                url: '../services/controllers/adminLoginController.php',
                data: adminLoginData,
                dataType: 'json',
                beforeSend: function () {
                    $('#login').html('Validating...');
                    $('#login').attr('disabled', true);
                },
                success: function (response) {
                    adminSignInProcess(response.value);
                },
            }); // ends create ajax
        }

        function adminSignInProcess(data) {
            var codeNo = '';
            var msgs = '';
            var tokenId = '';
            $.each(data, function (key, item) {
                codeNo = item.code;
                msgs = item.msgs;
                tokenId = item.token;
            });
            if (codeNo == "200") {
                $('#login').html('Connecting...');
                $('#login').attr('disabled', false);
                localStorage.setItem('token', tokenId);
                window.location.href = "../admin/?pg=home";

            } else if (codeNo == "400") {
                $('#login').html('Login');
                $('#login').attr('disabled', false);
                error_alert(msgs);
            } else if (codeNo == "404") {
                $('#login').html('Login');
                $('#login').attr('disabled', false);
                error_alert(msgs);
            }
        }
    });


});