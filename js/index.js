

// $(document).on('submit','#login_form',function(event) {

//     var action = $(this).attr('action');
//     var method = $(this).attr('method');
//     var form = $(this);
    
//     event.preventDefault();

//         $.ajax({
//             url: action,
//             type: method,
//             data: form.serialize(),
//             dataType: "JSON",
//             success: function (data) {
//                 var status = data.status;
//                 if (status == true) {
//                     $("#alert").html('<div class="alert alert-success" role="alert">'+data.msg+'</div>')
//                     setTimeout(() => {
//                         location.reload();
//                     }, 1000);
//                 }else{
//                     $("#alert").html('<div class="alert alert-danger" role="alert">'+data.msg+'</div>')
//                 }
//             },
//             error: function (data) {
//                 console.log('An error occurred.');
//                 console.log(data);
//             },
//         });

// });