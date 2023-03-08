// Thêm người dùng

// $(document).ready(function () {
    //     $("#create").click(function (e) {
    //         e.preventDefault();
    //         var username = $("#name").val();
    //         var main_major = $("#main_major").val();
    //         var class_id = $("#class_id option:selected").val();
    //         var arr = [];
    //         $.ajax({
    //             url: "add.php",
    //             method: "POST",
    //             data: {
    //                 username:username,
    //                 main_major: main_major,
    //                 class_id: class_id
    //             },
    //             success: function (result) {
    //                 arr = JSON.parse(result);
    //                 console.log(arr);
    //                 if (arr.status == 200) {
    //                     //ok
    //                     // console.log("OK");

    //                 } else {
    //                     //html error
    //                     console.log("error")
    //                 }
    //                 $("#modal_add").hide();
    //                 $(".modal-backdrop.show").css("opacity", "0")

    //                 $('#mytable').load(location.href + " #mytable");
    //             }
    //         }) 
    //     })

    // $("#btn-create").click(function (e) {
    //     // e.preventDefault();
    //     alert("OK");
    // });

    // $("#insert_form").submit(function (e) { 
    // var formData = new FormData($("form")[0]);
    // formData.append("#insert_form",true);

    // console.log(formData);
    // e.preventDefault();
    // });

    // Khi submit vào form <form id= 'insert_form'> </form> 

    // $(document).on('submit', '#insert_form', function (e) {

    //     var formData = new FormData(this);

    //     // Thêm trường save_user có value true vào mảng formData
    //     formData.append('save_user', true)
    //     e.preventDefault();

    //     $.ajax({
    //         type: "POST",
    //         url: "add.php",
    //         data: "formData",
    //         processData: false,
    //         contentType: false,
    //         success: function (response) {
    //             var res = jQuery.parseJSON(response);
    //             // if (res.status == 422) {
    //             //     $('#errorMessage').removeClass('d-none');
    //             //     $('#errorMessage').text(res.message);

    //             // } else if (res.status == 200) {

    //             //     $('#errorMessage').addClass('d-none');
    //             //     $('#studentAddModal').modal('hide');
    //             //     $('#saveStudent')[0].reset();

    //             //     alertify.set('notifier', 'position', 'top-right');
    //             //     alertify.success(res.message);

    //             //     $('#myTable').load(location.href + " #myTable");

    //             // } else if (res.status == 500) {
    //             //     alert(res.message);
    //             // }
    //             alert(res)
    //         }
    //     });




    // })

// });


//

// $(document).ready(function () {
// $("#save_User").submit(function (e) { 
//     var formData = new FormData(this);
//     formData.append("#save_User",true);
//     alert("OK");
//     e.preventDefault(formData);
// });

// $("btn-create").click(function (e) { 
//     // e.preventDefault();
//     alert("OK");
// });

// })


// function delete_user(user_id) {
//     if (confirm("Bạn có muốn xóa thành viên không?")) {
//         var id = user_id;
//         if (id) {
//             $.ajax({
//                 url: "delete.php",
//                 method: "POST",
//                 data: {
//                     id: id,
//                 },
//                 success: function () {
//                     $('tr#' + id + '').css('background-color', '#ccc');
//                     $('tr#' + id + '').fadeOut('slow');
//                     $('div#status').attr('class', 'alert alert-danger alert-dismissible fade show'),
//                         $('div#status').attr('role', 'alert'),
//                         $('div#status').html("<strong>Hey!</strong> Xóa thông tin người dùng có id: " + id + " thành công " + "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>");
//                 }
//             })

//         } else {
//             alert("Không có id");
//         }
//     } else {
//         return false;
//     }
// }




