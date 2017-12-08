$(document).ready(function() {
    $( "#submitSignup" ).on( "click", function(e) {
        e.preventDefault();
        
        var msg = "";
        
        var name = $("#nameSignup").val();
        var email = $("#emailSignup").val();
        var password = $("#passwordSignup").val();
        var password2 = $("#password2Signup").val();
        
        console.log("Name : "+name);
        console.log("Email :"+email);
        console.log("Password :"+password);
        console.log("Password2 :"+password2);
        
        var check = true;
        if(name === "" || name == null)
        {
            check = false;
            msg += "Error : Please confirm your name";
            msg += "<br/>";

        }
        
        if(email === "" || email == null)
        {
            check = false;
            msg += "Error : Please confirm your email";
            msg += "<br/>";
        }
        
        if(password === "" || password == null)
        {
            check = false;
            msg += "Error : Please enter your password";
            msg += "<br/>";
        }
        
        if(password2 === "" || password2 == null)
        {
            check = false;
            msg += "Error : Please confirm your password";
            msg += "<br/>";
        }
        
        if(password != password2)
        {
            check = false;
            msg += "Error : The 2 password doesn't match";
            msg += "<br/>";
        }
        
        console.log("check : "+check);

        if(check)
        {
            var params = {
                "name": name,
                "email": email,
                "password": password
            };
            
            $.ajax({
                type: "POST",
                url: "https://nuit-info-2017-terminatorxrobocop.c9users.io/Api/User/signup.php",
                data: params,
                success: function(objMessage){ 
                    objJson = jQuery.parseJSON(objMessage);
                    console.log(objJson);
                    msg = objJson.message;
                    console.log(msg);
                    $("#message").text(msg);
                },
                error: function(xhr, textStatus, errorThrown){
                    console.log("error");
                    msg = "error";
                    msg += textStatus;
                    $("#message").text(msg);
                }
            });
        }else{
            $("#message").text(msg);
        }
        
    });
})
