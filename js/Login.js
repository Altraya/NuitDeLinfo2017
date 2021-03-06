$(document).ready(function() {
    $( "#submitLogin" ).on( "click", function(e) {
        e.preventDefault();
        var login = $("#loginuser").val();
        var password = $("#password").val();

        if(login == ""){
            msg = "Error, your login can't be empty"; 
        }
        if(password == ""){
            msg = "Error, your password can't be empty";
        }
        var params = {
                "name": login,
                "password": password
            };
            
        params = JSON.stringify(params);
        
        $.ajax({
            type: "POST",
            url: "https://nuit-info-2017-terminatorxrobocop.c9users.io/Api/User/signin.php",
            data: params,
            success: function(objMessage){   
                objJson = jQuery.parseJSON(objMessage);
                msg = objJson.message;
                $("#message").text(msg);
            },
            error: function(xhr, textStatus, errorThrown){
                msg = textStatus;
                $("#message").text(msg);
            }
        });
    });
});
