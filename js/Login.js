$(document).ready(function() {
    $( "#submitLogin" ).on( "click", function(e) {
        e.preventDefault();
        var login = $("#login").val();
        var password = $("#password").val();
        if(login == ""){
            msg = "Error, your login can't be empty"    
        }
        if(password == ""){
            msg = "Error, your password can't be empty" 
        }
        var params = {
                "login": login,
                "password": password
            };
            
            $.ajax({
                type: "POST",
                url: "https://nuit-info-2017-terminatorxrobocop.c9users.io/Api/User/signin.php",
                data: params,
                success: function(objMessage){   
                    console.log(objMessage);
                    console.log("success");
                    msg = objMessage.message;
                    $("#message").text((msg);
                },
                error: function(xhr, textStatus, errorThrown){
                    console.log("error");
                    msg = textStatus;
                    $("#message").text((msg);
                }
            });
    });
});
