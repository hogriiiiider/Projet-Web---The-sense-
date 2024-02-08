$(".wronguser").hide();

$(".connexion-btn").on("click", function () {
    var _name = $('#name').val();
    var _mail = $('#mail').val();
    var _password = $("#newpassword").val();
    var _confirmpassword = $('#confirmpassword')

    if (_password == _confirmpassword){
        if (_mail.length > 0 && _mail.includes('@') && _password.length > 0 && _name.length > 0){

            $.post("inscription.php", {mail: _mail, password: _password, name: _name}, function(data, textStatus) {
                console.log(data);
                if(data == 'user'){

                }
                else{;
                    $('#name').val("")
                    $("#mail").val("");
                    $("#newpassword").val("");
                    $("#confirmpassword").val("");
                }
            });
        }

        else{
            $("#username").val("");
            $("#password").val("");
            $(".wronguser").show();
            stop()
        }
    }else{
        stop()
    }
})