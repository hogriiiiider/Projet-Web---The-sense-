$(".wronguser").hide();

$(".connexion-btn").on("click", function () {
    var _username = $('#username').val();
    var _password = $("#password").val();
    if (_username.length > 0 && _username.includes('@') && _password.length > 0){


        $.post("index.php", {mail: _username, password: _password}, function(data, textStatus) {
            console.log(data);
            if(data == 'user'){
                $("connexion-box").hide();
            }
            else{;
                $("#username").val("");
                $("#password").val("");
                $(".wronguser").show();
            }
        });
    }

    else{
        $("#username").val("");
        $("#password").val("");
        $(".wronguser").show();
        stop()
    }
})