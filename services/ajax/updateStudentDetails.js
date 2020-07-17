$(document).ready(function () {

    // function to display error encountered at change Password function
    function error_alert(value) {
        $('#error').html(
            `<div class="alert alert-danger" role="alert"><strong><i class="la la-warning"></i></strong>&ensp;${value}</div>`
        );
    }

    $('#updateStudentDetails').click(function () {
        // alert("yeah");
        saveProfile();

        function saveProfile() {
            var AccessToken = localStorage.getItem('token');
            var data = $('#studentDetails').serialize();
            $.ajax({
                type: 'POST',
                url: '../services/controllers/updateStudentdetails.php',
                data: data,
                headers: {
                    Authorization: AccessToken,
                },
                beforeSend: function () {
                    $('#updateStudentDetails').html('Validating...');
                    $('#updateStudentDetails').attr('disabled', true);
                },
                success: function (response) {
                    updateStudentDetail(response.value);
                },
            });
        }

        function updateStudentDetail(data) {
            var codeNo = '';
            var msgs = '';
            var tokenId = '';
            $.each(data, function (key, item) {
                codeNo = item.code;
                msgs = item.msgs;
                tokenId = item.token;
            });
            if (codeNo == "200") {
                $('#updateStudentDetails').html('Update Student Details');
                $('#updateStudentDetails').attr('disabled', false);
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Profile Updated',
                    showConfirmButton: false,
                    timer: 2500,
                });
                window.location.href = "?pg=bio-data";

            } else if (codeNo == "400") {
                $('#updateStudentDetails').html('Update Student Details');
                $('#updateStudentDetails').attr('disabled', false);
                error_alert(msgs);
            } else if (codeNo == "404") {
                $('#updateStudentDetails').html('Update Student Details');
                $('#updateStudentDetails').attr('disabled', false);
                error_alert(msgs);
            }
        }
    });


});