$('#login').click(function(){
    $.ajax({
        type: "POST",
        url: "php/login.php",
        data: {
            'numReg': $('#num_reg').val(),
            'pwd': $('#pwd').val()

        },
        success: function (response) {
            console.log(response)
        }
    });
});