$(document).on('submit','#login_form',function(event) {

    var action = $(this).attr('action');
    var method = $(this).attr('method');
    var form = $(this);
    
    event.preventDefault();

    $.ajax({
        url: action,
        type: method,
        data: form.serialize(),
        dataType: "JSON",
        success: function (data) {
            var status = data.status;
            if (status == true) {
                $("#alert").html('<div class="alert alert-success" role="alert">'+data.msg+'</div>')
                setTimeout(() => {
                    location.reload();
                }, 1000);
            }else{
                $("#alert").html('<div class="alert alert-danger" role="alert">'+data.msg+'</div>')
            }
        },
        error: function (data) {
            console.log('An error occurred.');
            console.log(data);
        },
    });

});

$(document).on('submit','#register_form',function(event) {
    var action = $(this).attr('action');
    var method = $(this).attr('method');
    var form = $(this);

    event.preventDefault();

    $.ajax({
        url: action,
        type: method,
        data: form.serialize(),
        dataType: "JSON",
        success: function (data) {
            var status = data.status;
            if (status == true) {
                $("#alert").html('<div class="alert alert-success" role="alert">'+data.msg+'</div>')
                setTimeout(() => {
                    window.location.replace("http://localhost:8888/projects/index.php");
                }, 1000);
            }else{
                $("#alert").html('<div class="alert alert-danger" role="alert">'+data.msg+'</div>')
            }
        },
        error: function (data) {
            console.log('An error occurred.');
            console.log(data);
        },
    });

});
 
$(document).ready(function() {
    if($('#welcome_form').length>0){
        var userDataTable = $('#welcome_form').DataTable({
        'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'ajax': {
                    'url':'php/data_controller.php'
                },
                'columns': [ 
                    { data: "name" },
                    { data: "email" },
                    { data: "mobile" },
                    { data: "password" },
                    { data: "address" }, 
                    { data: "action" }
                ],
        });
    }
    

    // Update record
    $('#welcome_form').on('click','.updateUser',function(){
        var id = $(this).data('id');
        document.getElementById('txt_userid').value = id;
        // $('#txt_userid').val(id);
        // AJAX request
        $.ajax({
        url: 'php/data_controller.php',
        type: 'post',
        data: {request: "update_view", id: id},
        dataType: 'json',
        success: function(response){
            console.log(response);
            console.log(5);
            if(response.status == 1){

                $('#name').val(response.data.name);
                $('#email').val(response.data.email);
                $('#mobile').val(response.data.mobile);
                $('#password').val(response.data.password);
                $('#address').val(response.data.address);

                userDataTable.ajax.reload();
            }else{
                alert("Invalid ID.");
            }
        }
        });

    });

    // Save user 
    $('#btn_save').click(function(){
        
        var id = document.getElementById("txt_userid").value;
        var name = $('#name').val().trim();
        var email = $('#email').val().trim();
        var mobile = $('#mobile').val().trim();
        var password = $('#password').val().trim();
        var address = $('#address').val().trim();  

        console.log(name)

        if(name !='' && email != '' && mobile != '' && password != '' && address != ''){

        // AJAX request
        $.ajax({
            url: 'php/data_controller.php',
            type: 'post',
            data: {request: "update_db", id: id ,name: name, email: email, mobile: mobile, password: password, address: address},
            dataType: 'json',
            success: function(response){
            if(response.status == 1){
                alert(response.message);

                // Empty and reset the values
                $('#name','#email','#mobile','#password','#address').val('');

                // Reload DataTable
                userDataTable.ajax.reload();

                // Close modal
                $('#updateModal').modal('toggle');
            }else{
                alert(response.message);
            }
            }
        });

    }else{
        alert('Please fill all fields.');
    }
    });

    // Delete record
    $('#welcome_form').on('click','.deleteUser',function(){
        var id = $(this).data('id');

        var deleteConfirm = confirm("Are you sure?");
        if (deleteConfirm == true) {
        // AJAX request
        $.ajax({
            url: 'php/data_controller.php',
            type: 'post',
            data: {request: "delete_data", id: id},
            success: function(response){
                if(response == 1){
                alert("Record Deleted.");

                // Reload DataTable
                userDataTable.ajax.reload();
                }else{
                alert("Invalid ID.");
                }
            }
        });
        } 
    });
        
});