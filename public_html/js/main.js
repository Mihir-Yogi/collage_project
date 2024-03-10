$(document).ready(function(){
    var DOMAIN = "http://localhost/collage_project/public_html";
    $("#register_form").on("submit",function(){
        var status = false;
        var name = $("#username");
        var email = $("#email");
        var pass1 = $("#password1");
        var pass2 = $("#password2");
        var type = $("#usertype");


        var e_patt = new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-])*(\.[a-z]{2,4})$/);

        // for username

        if(name.val() == "" || name.val().length < 4){
            name.addClass("border-danger");
            $("#u_error").html("<span class='text-danger'>Please Enter Name and it contain more then character</span>");
            status = false;
        }else{
            name.removeClass("border-danger");
            $("#u_error").html("");
            status = true;
        }

        // for email Address

        if(!e_patt.test(email.val())){
            email.addClass("border-danger");
            $("#e_error").html("<span class='text-danger'>Please Enter valid email Address</span>");
            status = false;
        }else{
            email.removeClass("border-danger");
            $("#e_error").html("");
            status = true;
        }
        
        // for main Password
        if(pass1.val() == "" || pass1.val().length < 9){
            pass1.addClass("border-danger");
            $("#p1_error").html("<span class='text-danger'>Please Enter more then 9 digit password</span>");
            status = false;
        }else{
            pass1.removeClass("border-danger");
            $("#p1_error").html("");
            status = true;
        }

        // for conform password

        if(pass2.val() == "" || pass2.val().length < 9){
            pass2.addClass("border-danger");
            $("#p2_error").html("<span class='text-danger'>Please Enter more then 9 digit password</span>");
            status = false;
        }else{
            pass2.removeClass("border-danger");
            $("#p2_error").html("");
            status = true;
        }

        // for userType

        if(type.val() == ""){
            type.addClass("border-danger");
            $("#t_error").html("<span class='text-danger'>Please Enter User Type!!</span>");
            status = false;
        }else{
            type.removeClass("border-danger");
            $("#t_error").html("");
            status = true;
        }

        // for matching a tow password and creating a account 
        
        if(pass1.val() == pass2.val() && status == true){
            $.ajax({
                url : DOMAIN+"/includes/process.php",
                method : "POST",
                data : $("#register_form").serialize(),
                success : function(data){
                    if(data ==  "EMAIL_ALREADY_EXISTS"){
                        alert("It seems like your email is already used!!");
                    }else if(data == "SOME_ERROR"){
                        alert("Something Wrong!");
                    }else{
                        window.location.href = encodeURI(DOMAIN+"/index.php?msg=You_are_register_now_you_an_login!");
                    }
                }
            })  
        }else{
            pass2.addClass("border-danger");
            $("#pass2_error").html("<span class='text-danger'>Password not matched</span>");
            status = true;
        }
    })
})

