$(document).ready(function () {
    // function to display error encountered at change Password function
    function error_alert(value) {
        $('#error').html(
            `<div class="alert alert-danger" role="alert"><strong><i class="la la-warning"></i></strong>&ensp;${value}</div>`
        );
    }

    $('#saveSelectedCourses').click(function () {
        saveSelectedCourses();

        function saveSelectedCourses() {
            var AccessToken = localStorage.getItem('token');
            var data = $('#courses').serialize();
            $.ajax({
                type: 'POST',
                url: '../services/controllers/submitCourses.php',
                data: data,
                headers: {
                    Authorization: AccessToken,
                },
                beforeSend: function () {
                    $('#saveSelectedCourses').html('Validating...');
                    $('#saveSelectedCourses').attr('disabled', true);
                },
                success: function (response) {
                    saveSelectedCoursesCallback(response.value);
                },
            });
        }

        function saveSelectedCoursesCallback(data) {
            var codeNo = '';
            var msgs = '';
            var tokenId = '';
            $.each(data, function (key, item) {
                codeNo = item.code;
                msgs = item.msgs;
                tokenId = item.token;
            });
            if (codeNo == "200") {
                $('#saveSelectedCourses').html('Save Selected Courses');
                $('#saveSelectedCourses').attr('disabled', false);
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Courses Saved',
                    showConfirmButton: false,
                    timer: 2500,
                });
                window.location.href = "?pg=course-offered";

            } else if (codeNo == "400") {
                $('#updateSettings').html('Save Update');
                $('#updateSettings').attr('disabled', false);
                error_alert(msgs);
            } else if (codeNo == "404") {
                $('#updateSettings').html('Save Update');
                $('#updateSettings').attr('disabled', false);
                error_alert(msgs);
            }
        }
    });





});