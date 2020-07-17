$(document).ready(function () {

    get_table_data();

    function get_table_data() {
        var AccessToken = localStorage.getItem('token');
        // search = like;
        $.ajax({
            url: '../services/controllers/getStudentSubjects.php',
            type: 'POST',
            headers: {
                Authorization: AccessToken,
            },
        }).done(function (data) {
            if (data.data != 'zero') {
                $("#totalPage").val(data.count);
                if (data.count != 0) {
                    //call manage data function
                    manage_data(data.data);
                } else {
                    $("#subjectTable").html('<th class="sorting_1 text-center" rowspan="6" colspan="8"><h3>No List Available </h3></th>');
                }

            } else {
                $("#subjectTable").html(`<th class="sorting_1 text-center" rowspan="6" colspan="8"><h3>No List Available </h3></th>`);
            }

        });
    }

    //manage the data
    function manage_data(data) {
        var row = '';
        $.each(data, function (key, value) {
            row += '<tr>';
            row += '<td scope="" >' + value.index + '</td>';
            row += '<td class="">' + value.subjects + '</td>';
            row += '</tr>';
        });

        $("#subjectTable").html(row);


    }







});