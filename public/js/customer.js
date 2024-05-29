$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "/api/customers",
        dataType: 'json',
        success: function (data) {
            console.log(data);
            $.each(data, function (key, value) {
                console.log(value);
                id = value.customer_id;

                var tr = $("<tr>");
                tr.append($("<td>").html(value.customer_id));
                tr.append($("<td>").html(value.fname));
                tr.append($("<td>").html(value.lname));
                tr.append($("<td>").html(value.addressline));
                tr.append("<td align='center'><a href='#' data-toggle='modal' data-target='#itemModal' id='editbtn' data-id=" + id + "><i class='fas fa-edit' aria-hidden='true' style='font-size:24px; color:blue'></i></a></td>");
                tr.append("<td><a href='#'  class='deletebtn' data-id=" + id + "><i  class='fa fa-trash' style='font-size:24px; color:red' ></a></i></td>");
                $("#cbody").append(tr);
            });
        },
        error: function () {
            console.log('AJAX load did not work');
            alert("error");
        }
    });

    $("#customerSubmit").on('click', function (e) {
        e.preventDefault();
        var data = $('#cform')[0];
        console.log(data);
        let formData = new FormData(data);
        console.log(formData);
        for (var pair of formData.entries()) {
            console.log(pair[0] + ', ' + pair[1]);
        }
        $.ajax({
            type: "POST",
            url: "/api/customers",
            data: formData,
            contentType: false,
            processData: false,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            dataType: "json",
            success: function (data) {
                console.log(data);
                $("#customerModal").modal("hide");


                var img = "<img src=" + data.customer.image_path + " width='200px', height='200px'/>";
                var tr = $("<tr>");
                tr.append($("<td>").html(data.customer.customer_id));
                tr.append($("<td>").html(img));
                tr.append($("<td>").html(data.customer.lname.description));
                tr.append($("<td>").html(data.customer.fname));
                tr.append($("<td>").html(data.customer.addressline));
                tr.append("<td align='center'><a href='#' data-toggle='modal' data-target='#itemModal' id='editbtn' data-id=" + data.customer.customer_id + "><i class='fa fa-pencil-square-o' aria-hidden='true' style='font-size:24px' ></a></i></td>");
                tr.append("<td><a href='#'  class='deletebtn' data-id=" + data.customer.customer_id + "><i  class='fa fa-trash-o' style='font-size:24px; color:red' ></a></i></td>");
                $("#cbody").prepend(tr);

            },
            error: function (error) {
                console.log(error);
            }
        });
    });

})