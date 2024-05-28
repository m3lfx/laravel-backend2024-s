$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "/api/customers",
        dataType: 'json',
        success: function (data) {
            console.log(data);
            // $.each(data, function (key, value) {
            //     // console.log(value);
            //     id = value.item_id;
            //     var img = `<img src= ${value.image_path} width='200px', height='200px'/>`;
            //     var tr = $("<tr>");
            //     tr.append($("<td>").html(value.item_id));
            //     tr.append($("<td>").html(img));
            //     tr.append($("<td>").html(value.description));
            //     tr.append($("<td>").html(value.cost_price));
            //     tr.append($("<td>").html(value.sell_price));
            //     tr.append("<td align='center'><a href='#' data-toggle='modal' data-target='#itemModal' id='editbtn' data-id=" + id + "><i class='fas fa-edit' aria-hidden='true' style='font-size:24px; color:blue'></i></a></td>");
            //     tr.append("<td><a href='#'  class='deletebtn' data-id=" + id + "><i  class='fa fa-trash' style='font-size:24px; color:red' ></a></i></td>");
            //     $("#ibody").append(tr);
            // });
        },
        error: function () {
            console.log('AJAX load did not work');
            alert("error");
        }
    });

})