function loginSubmit(id) {
    event.preventDefault()

    $('#submit-btn').html(`<img src="./img/Spinner-1.4s-164px.svg" width="100px" height="100px">`)

    var form = document.getElementById(id);
    var form_data = new FormData(form);

    form_data.append('dashboardlogin', '1');
    $.ajax({
        url: './login_ajax.php',
        type: "POST",
        data: form_data,
        contentType: false,
        processData: false,
        success: function (data) {


            var responseArray = JSON.parse(data)
            var status = responseArray[0];
            var response = responseArray[1];

            if (status == 'false') {
                $('#login-error').html(`<div class='alert alert-danger alert-dismissible fade show' role='alert'><strong>${response}</strong></div>`)

                $('#submit-btn').html(` <button type="submit" name="login" class="btn btn-primary mt-4 pt-2 pb-2 pl-5 pr-5">Submit</button>`)
            } else {
                $('#login-error2').html(`<div class='alert alert-success alert-dismissible fade show' role='alert'><strong>${response}</strong></div>`)

                $('#login-form-div').removeClass('d-flex').addClass('d-none')
                $('#otp-verification-div').removeClass('d-none').addClass('d-flex')


                $(function () {
                    $('#counter-box').setCountDownTimer({
                        time: "00:10:00",
                        countDownText: 'Remaining time:',
                        afterCountText: 'Time\'s up!',
                    });
                });
                setTimeout(() => {
                    location.reload()
                }, 600000);

            }

        }
    })
}

function otp_verification(myform, event) {
    event.preventDefault();

    $('#otp-submit').html(`<img src="./img/Spinner-1.4s-164px.svg" width="100px" height="100px">`)

    let otp_form = document.getElementById(myform);
    let otp_form_data = new FormData(otp_form);

    otp_form_data.append('otp_verification', '1');

    $.ajax({
        url: './login_ajax.php',
        type: 'POST',
        data: otp_form_data,
        contentType: false,
        processData: false,
        success: function (data) {

            var otp_responseArray = JSON.parse(data)
            var otp_status = otp_responseArray[0];
            var otp_response = otp_responseArray[1];

            if (otp_status == 'false') {
                $('#login-error2').html(`<div class='alert alert-danger alert-dismissible fade show' role='alert'><strong>${otp_response}</strong></div>`)
                $('#otp-submit').html(`<button type="submit" name="verify" class="btn btn-primary mt-4 pt-2 pb-2 pl-5 pr-5">Verify</button>`)
            } else {
                $('#login-error2').html(`<div class='alert alert-success alert-dismissible fade show' role='alert'><strong>${otp_response}</strong></div>`)
                $('#otp-submit').html(`<button type="submit" name="verify" class="btn btn-primary mt-4 pt-2 pb-2 pl-5 pr-5">Verify</button>`)

                $('#login-form-div').removeClass('d-none').addClass('d-flex');
                window.location.href = './dashboard.php'

            }
        }
    })

}



// -------------------------------------- Reset Password ------------------------------

$('#reset-pass-btn').on('click', function () {
    $('#login-form-div').removeClass('d-flex')
    $('#login-form-div').addClass('d-none')

    $('#reset_pass_form_box').removeClass('d-none');
    $('#reset_pass_form_box').addClass('d-flex');

})


function send_reset_otp(form_id) {
    event.preventDefault();

    $('#reset-otp-submit').html(`<img src="./img/Spinner-1.4s-164px.svg" width="100px" height="100px">`)


    let reset_otp_form = document.getElementById(form_id);
    let reset_otp_form_data = new FormData(reset_otp_form);

    reset_otp_form_data.append('reset_otp_send', '1');

    $.ajax({
        url: './login_ajax.php',
        type: 'POST',
        data: reset_otp_form_data,
        contentType: false,
        processData: false,
        success: function (data) {

            var reset_otp_responseArray = JSON.parse(data)
            var reset_otp_status = reset_otp_responseArray[0];
            var reset_otp_response = reset_otp_responseArray[1];

            if (reset_otp_status == 'false') {
                $('#login-error3').html(`<div class='alert alert-danger alert-dismissible fade show' role='alert'><strong>${reset_otp_response}</strong></div>`)
                $('#reset-otp-submit').html(`<button type="submit" name="verify" class="btn btn-primary mt-4 pt-2 pb-2 pl-5 pr-5">Send OTP</button>`)
            } else {
                $('#login-error4').html(`<div class='alert alert-success alert-dismissible fade show' role='alert'><strong>${reset_otp_response}</strong></div>`)
                $('#reset_pass_form_box').removeClass('d-flex').addClass('d-none')
                $('#reset-otp-verification-div').removeClass('d-none').addClass('d-flex')
            }
        }
    })
}



function reset_otp_verification(form_id) {
    event.preventDefault();

    $('#reset-otp-verify').html(`<img src="./img/Spinner-1.4s-164px.svg" width="100px" height="100px">`)


    let reset_otp_form = document.getElementById(form_id);
    let reset_otp_form_data = new FormData(reset_otp_form);

    reset_otp_form_data.append('reset_otp_verification', '1');

    $.ajax({
        url: './login_ajax.php',
        type: 'POST',
        data: reset_otp_form_data,
        contentType: false,
        processData: false,
        success: function (data) {

            var get_otp_responseArray = JSON.parse(data)
            var get_otp_status = get_otp_responseArray[0];
            var get_otp_response = get_otp_responseArray[1];

            if (get_otp_status == 'false') {
                $('#login-error4').html(`<div class='alert alert-danger alert-dismissible fade show' role='alert'><strong>${get_otp_response}</strong></div>`)
                $('#reset-otp-verify').html(`<button type="submit" name="verify" class="btn btn-primary mt-4 pt-2 pb-2 pl-5 pr-5">Verify</button>`)
            } else {
                $('#login-error5').html(`<div class='alert alert-success alert-dismissible fade show' role='alert'><strong>${get_otp_response}</strong></div>`)

                $('#reset-otp-verification-div').removeClass('d-flex').addClass('d-none')
                $('#new-password-div').removeClass('d-none').addClass('d-flex')
            }
        }
    })

}




$('#c-pass').on('keyup', function () {
    let npass = $('#n-pass').val();
    let cpass = $('#c-pass').val();

    if (cpass == npass) {
        $('#c-pass').css('border', '2px solid green')
    } else {
        $('#c-pass').css('border', '2px solid red')
    }

})


function reset_password(form_id) {
    event.preventDefault();

    $('#new-pass-reset').html(`<img src="./img/Spinner-1.4s-164px.svg" width="100px" height="100px">`)

    let reset_pass_form = document.getElementById(form_id);
    let reset_pass_data = new FormData(reset_pass_form);

    reset_pass_data.append('reset_password', '1');

    $.ajax({
        url: './login_ajax.php',
        type: 'POST',
        data: reset_pass_data,
        contentType: false,
        processData: false,
        success: function (data) {

            var get_reset_responseArray = JSON.parse(data)
            var get_reset_status = get_reset_responseArray[0];
            var get_reset_response = get_reset_responseArray[1];

            if (get_reset_status == 'false') {
                $('#login-error5').html(`<div class='alert alert-danger alert-dismissible fade show' role='alert'><strong>${get_reset_response}</strong></div>`)
                $('#new-pass-reset').html(`<button type="submit" name="verify" class="btn btn-primary mt-4 pt-2 pb-2 pl-5 pr-5">Reset</button>`)
            } else {
                $('#login-error5').html(`<div class='alert alert-success alert-dismissible fade show' role='alert'><strong>${get_reset_response}</strong></div>`)

                window.location.reload();
            }
        }
    })


}