$(document).on('submit','#login_form',function(event) {

    var action = $(this).attr('action');
    var method = $(this).attr('method');
    var form = $(this);

// opg
    
    event.preventDefault();

        $.ajax({
            url: action,
            type: method,
            data: form.serialize(),
            dataType: "JSON",
            success: function (data) {
                var status = data.status;
                if (status == false) {
                    $("#alert").html('<div class="alert alert-danger" role="alert">'+data.msg+'</div>')
                }else{
                    $("#alert").html('<div class="alert alert-success" role="alert">'+data.msg+'</div>')
                }
                console.log('Submission was successful.');
                console.log(data);
            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data);
            },
        });

});