$(document).ready(function(){
    var DOMAIN = "http://localhost/collage_project/public_html";

    //for registration 

    $("#register_form").on("submit",function(){
        var status = false;
        var name = $("#username");
        var email = $("#email");
        var pass1 = $("#password1");
        var pass2 = $("#password2");
        var type = $("#usertype");


        var e_patt = new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-])*(\.[a-z]{2,4})$/);

        // for username

        if(name.val() == "" || name.val().length < 5){
            name.addClass("border-danger");
            ($("#u_error").html("<span class='text-danger'>Please Enter Name and it contain more then 5 character</span>"));
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
            $(".overlay").show();
            $.ajax({
                url : DOMAIN+"/includes/process.php",
                method : "POST",
                data : $("#register_form").serialize(),
                success : function(data){
                    if(data ==  "EMAIL_ALREADY_EXISTS"){
                        $(".overlay").hide();
                        alert("It seems like your email is already used!!");
                    }else if(data == "SOME_ERROR"){
                        $(".overlay").hide();
                        alert("Something Wrong!");
                    }else{
                        $(".overlay").hide();
                        window.location.href = encodeURI(DOMAIN+"/index.php?msg=You are register now you can login!");
                    }
                }
            })  
        }else{
            pass2.addClass("border-danger");
            $("#p2_error").html("<span class='text-danger'>Password not matched</span>");
            status = true;
        }
    })

    //for login 

    $("#form_login").on("submit",function(){

        var email = $("#log_email");
        var pass = $("#log_password");
        var status = false;
        if(email.val() == ""){
            email.addClass("border-danger");
            $("#e_error").html("<span class='text-danger'>Please Enter email Address</span>");
            status = false
        }else{
            email.removeClass("border-danger");
            $("#e_error").html("");
            status = true
        }
        if(pass.val() == ""){
            pass.addClass("border-danger");
            $("#p_error").html("<span class='text-danger'>Please Enter Password</span>");
            status = false
        }else{
            pass.removeClass("border-danger");
            $("#p_error").html("");
            status = true
        }
        if(status){
            $(".overlay").show();
            $.ajax({
                url : DOMAIN+"/includes/process.php",
                method : "POST",
                data : $("#form_login").serialize(),
                success : function(data){
                    if(data ==  "NOT_REGISTERED"){  
                        $(".overlay").hide();
                        email.addClass("border-danger");
                        $("#e_error").html("<span class='text-danger'>It seems like you are not Registered please Register first!!</span>");
                    }else if(data == "PASSWORD_NOT_MATCHED"){
                        $(".overlay").hide();
                        pass.addClass("border-danger");
                        $("#p_error").html("<span class='text-danger'>Please Enter Correct Password</span>");
                    }else{
                        $(".overlay").hide();
                        console.log(data);
                        window.location.href = encodeURI(DOMAIN+"/dashboard.php");
                    }
                }
            })
        }
    })
    // fetch category
    fetch_category();
    function fetch_category() {
        $.ajax({
            url : DOMAIN+"/includes/process.php",
            method : "POST",
            data : {getCategory:1},
            success : function(data){
                var root = "<option value='0'>Root</option>";
                $("#parent_category").html(root+data);
            }
        })
    }
    

    $("#child_form").on("submit", function() {
        var selectedIndex = $("#parent_category").prop("selectedIndex"); // Get the index of the selected option
        var childName = $("#child_name").val(); // Get the value of the child category name input
        var formData = {
            "child_name": childName,
            "selected_index": selectedIndex
        };
        console.log(JSON.stringify(formData));

        if (selectedIndex == 0) {
            $("#parent_category").addClass("border-danger");
            $("#p_error").html("<span class='text-danger'>Please Select a Parent Category</span>");
            return false; 
        } else {
            $("#parent_category").removeClass("border-danger");  
            $("#p_error").html(""); 
        }
        if (childName == ""){
            $("#child_name").addClass("border-danger");
            $("#c_error").html("<span class='text-danger'>Please Enter Child Category name</span>");
            return false; 
        } else {  
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data: formData,
                success: function(data) {
                    if (data == "CATEGORY_ADDED") {
                        $("#child_name").removeClass("border-danger");
                        $("#c_error").html("<span class='text-success'>New category successfully added!!</span>");
                        $("#child_name").val("");
                    }else{
                        alert(data);
                    }
                }
            })
        }
    })
    
    
    


})
