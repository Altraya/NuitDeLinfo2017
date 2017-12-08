$(document).ready(function() {
    $( "#submitLogin" ).on( "click", function(e) {
        e.preventDefault();
        var login = $("#login").val();
        var password = $("#password").val();
        
        var params = {
                "login": login,
                "password": password
            };
            
            $.ajax({
                type: "POST",
                url: "https://nuit-info-2017-terminatorxrobocop.c9users.io/Api/User/login.php",
                data: params,
                success: function(objMessage){   
                    console.log(objMessage);
                    console.log("success");
                    msg = objMessage.message;
                },
                error: function(xhr, textStatus, errorThrown){
                    console.log("error");
                    msg = textStatus;
                }
            });
    }
