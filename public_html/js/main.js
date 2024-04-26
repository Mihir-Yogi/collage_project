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

        var LoginData = $("#form_login").serialize();
        
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
                data : LoginData,
                success : function(data){
                    // alert(data);
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
                        if (data.trim() == "adminDashboard.php") {
                            window.location.href = "admin/index.php"; 
                        } else if (data.trim() == "user_dashboard.php") {
                            window.location.href = "user_dashboard.php";
                        }
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
    




// for child form

    $("#child_form").on("submit", function() {
        var formData = $(this).serialize();
    
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: formData,
            success: function(data) {
                if (data.trim() === "CATEGORY_ADDED") {
                    $("#child_name").removeClass("border-danger");
                    $("#c_error").html("<span class='text-success'>New category successfully added!!</span>");
                    $("#child_name").val("");
                    // fetch_category();
                } else {
                    alert(data);
                }
            }
        });
    });


    
// category form
    $("#category_form").on("submit", function() {
        var categoryName = $("#category_name").val();
        var formData = {
            "category_name": categoryName,
        };

        if (categoryName == ""){
            $("#category_name").addClass("border-danger");
            $("#cat_error").html("<span class='text-danger'>Please Enter Category name</span>");
            return false;
        } else {  
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data: formData,
                success: function(data) {
                    if (data.trim() == "CATEGORY_ADDED") {
                        $("#category_name").removeClass("border-danger");
                        $("#cat_error").html("<span class='text-success'>New category successfully added!!</span>");
                        $("#category_name").val("");
                        fetch_category();
                    }else{
                        alert(data);
                    }
                }
            })
        }
    })

    
    // for load data into dropdown


        function loadData(type, category_id){
            
            $.ajax({
                url : DOMAIN+"/includes/fetch_cat.php",
                type : "POST",
                data :{type : type , id : category_id},
                success: function(data){
                    if(type == "childData"){
                        $("#camera_c_depot").html(data);
                        $("#combo_c_depot").html(data);
                        $("#active_n_c").html(data);
                        $("#active_d_c").html(data);
                        $("#active_h_c").html(data);
                    }else{
                        $("#camera_d_cat").append(data);
                        $("#combo_d_cat").append(data);
                        $("#active_n_d").append(data);
                        $("#active_d_d").append(data);
                        $("#active_h_d").append(data);
                    }

                }
            })
        }

        $("#camera_d_cat").on("change",function(){
            var depot = $("#camera_d_cat").val();

            if(depot != ""){
                loadData("childData", depot);  
            }else{
                $("#camera_c_depot").html("");
            }

        })
        $("#combo_d_cat").on("change",function(){
            var depot = $("#combo_d_cat").val();

            if(depot != ""){
                loadData("childData", depot);  
            }else{
                $("#combo_c_depot").html("");
            }

        })
        $("#active_n_d").on("change",function(){
            var depot = $("#active_n_d").val();

            if(depot != ""){
                loadData("childData", depot);  
            }else{
                $("#active_n_c").html("");
            }

        })
        $("#active_d_d").on("change",function(){
            var depot = $("#active_d_d").val();

            if(depot != ""){
                loadData("childData", depot);  
            }else{
                $("#active_d_c").html("");
            }

        })
        $("#active_h_d").on("change",function(){
            var depot = $("#active_h_d").val();

            if(depot != ""){
                loadData("childData", depot);  
            }else{
                $("#active_h_c").html("");
            }

        })

        loadData();


    //for clear button
    $("#clear_button,#clear_combo,#clear_nvr,#clear_dvr,#clear_hdd").on("click", function() {
        // Clear camera form
        $("#cam_make").val("");
        $("#serial_no").val("");
        $("#mega_pixel").val("");
        $("#purchase_date").val("");
        $("#camera_d_cat").val("");
        $("#camera_c_depot").val("");
        $("#warranty").val("");
        $("#ex_date").val("");

        // Clear nvr/dvr/hdd combo form
        $("#combo_d_cat").val("");
        $("#combo_c_depot").val("");
        $("#nvr_make").val("");
        $("#dvr_make").val("");
        $("#hdd_make").val("");
        $("#nvr_serial_no").val("");
        $("#dvr_serial_no").val("");
        $("#hdd_serial_no").val("");
        $("#nvr_purchase_date").val("");
        $("#dvr_purchase_date").val("");
        $("#hdd_purchase_date").val("");
        $("#nvr_warranty").val("");
        $("#dvr_warranty").val("");
        $("#hdd_warranty").val("");
        $("#nvr_ex_date").val("");
        $("#dvr_ex_date").val("");
        $("#hdd_ex_date").val("");

        // Clear new_nvr/dvr/hdd

        $("#active_n_d").val("");
        $("#active_d_d").val("");
        $("#active_h_d").val("");
        $("#active_n_c").val("");
        $("#active_d_c").val("");
        $("#active_h_c").val("");
        
        // Clear any error messages
        $("small[id$='_error']").empty();
        
        // Remove any error styling
        $("input").removeClass("border-danger");
    });


    //combo form

    $("#combo_form").on("submit", function(){
        

        var comboData = $(this).serialize();
        console.log("Form data:", comboData);

        var comboD = $("#combo_d_cat").val();
        var comboC = $("#combo_c_depot").val();
        var ch = $("#dvr_ch").val(); 
        var nvrMake = $("#nvr_make").val();
        var dvrMake = $("#dvr_make").val();
        
        var hddMake = $("#hdd_make").val();
        var nvrSerial = $("#nvr_serial_no").val();
        var dvrSerial = $("#dvr_serial_no").val();
        var hddSerial = $("#hdd_serial_no").val();
        var nvrPurchaseDate = $("#nvr_purchase_date").val();
        var dvrPurchaseDate = $("#dvr_purchase_date").val();
        var hddPurchaseDate = $("#hdd_purchase_date").val();
        var nvrWarranty = $("#nvr_warranty").val();
        var dvrWarranty = $("#dvr_warranty").val();
        var hddWarranty = $("#hdd_warranty").val();
        var nvrExDate = $("#nvr_ex_date").val();
        var dvrExDate = $("#dvr_ex_date").val();
        var hddExDate = $("#hdd_ex_date").val();

        var status = true;

        // for dropdown
        if(comboD == "" ){
            $("#combo_d_cat").addClass("border-danger");
            $("#depot_error").html("<span class='text-danger'>Please Select Depot</span>");
            status = false
        }else{
            $("#combo_d_cat").removeClass("border-danger");
            $("#depot_error").html("");
        }

        if(comboC == ""){
            $("#combo_c_depot").addClass("border-danger");
            $("#category_error").html("<span class='text-danger'>Please Select Category</span>");
            status = false
        }else{
            $("#combo_c_depot").removeClass("border-danger");
            $("#category_error").html("");
        }

        // for make 
        if(nvrMake == ""){
            $("#nvr_make").addClass("border-danger");
            $("#n_make_error").html("<span class='text-danger'>Please Enter Make!</span>");
            status = false
        }else{
            $("#nvr_make").removeClass("border-danger");
            $("#n_make_error").html("");
        }
        if(dvrMake == ""){
            $("#dvr_make").addClass("border-danger");
            $("#d_make_error").html("<span class='text-danger'>Please Enter Make!</span>");
            status = false
        }else{
            $("#dvr_make").removeClass("border-danger");
            $("#d_make_error").html("");
        }
        if(hddMake == ""){
            $("#hdd_make").addClass("border-danger");
            $("#h_make_error").html("<span class='text-danger'>Please Enter Make!</span>");
            status = false
        }else{
            $("#hdd_make").removeClass("border-danger");
            $("#h_make_error").html("");
        }

        // for serial number
        if(nvrSerial == ""){
            $("#nvr_serial_no").addClass("border-danger");
            $("#n_serial_error").html("<span class='text-danger'>Please Enter Serial number!</span>");
            status = false
        }else{
            $("#nvr_serial_no").removeClass("border-danger");
            $("#n_serial_error").html("");
        }
        if(dvrSerial == ""){
            $("#dvr_serial_no").addClass("border-danger");
            $("#d_serial_error").html("<span class='text-danger'>Please Enter Serial number!</span>");
            status = false
        }else{
            $("#dvr_serial_no").removeClass("border-danger");
            $("#d_serial_error").html("");
        }
        if(hddSerial == ""){
            $("#hdd_serial_no").addClass("border-danger");
            $("#h_serial_error").html("<span class='text-danger'>Please Enter Serial number!</span>");
            status = false
        }else{
            $("#hdd_serial_no").removeClass("border-danger");
            $("#h_serial_error").html("");
        }

        // for purchase date
        if(nvrPurchaseDate == ""){
            $("#nvr_purchase_date").addClass("border-danger");
            $("#n_purchase_error").html("<span class='text-danger'>Please Enter Purchase Date!</span>");
            status = false
        }else{
            $("#nvr_purchase_date").removeClass("border-danger");
            $("#n_purchase_error").html("");
        }
        if(dvrPurchaseDate == ""){
            $("#dvr_purchase_date").addClass("border-danger");
            $("#d_purchase_error").html("<span class='text-danger'>Please Enter Purchase Date!</span>");
            status = false
        }else{
            $("#dvr_purchase_date").removeClass("border-danger");
            $("#d_purchase_error").html("");
        }
        if(hddPurchaseDate == ""){
            $("#hdd_purchase_date").addClass("border-danger");
            $("#h_purchase_error").html("<span class='text-danger'>Please Enter Purchase Date!</span>");
            status = false
        }else{
            $("#hdd_purchase_date").removeClass("border-danger");
            $("#h_purchase_error").html("");
        }

        // for warranty
        if(nvrWarranty == ""){
            $("#nvr_warranty").addClass("border-danger");
            $("#n_warranty_error").html("<span class='text-danger'>Please Enter warranty!</span>");
            status = false
        }else{
            $("#nvr_warranty").removeClass("border-danger");
            $("#n_warranty_error").html("");
        }
        if(dvrWarranty == ""){
            $("#dvr_warranty").addClass("border-danger");
            $("#d_warranty_error").html("<span class='text-danger'>Please Enter warranty!</span>");
            status = false
        }else{
            $("#dvr_warranty").removeClass("border-danger");
            $("#d_warranty_error").html("");
        }
        if(hddWarranty == ""){
            $("#hdd_warranty").addClass("border-danger");
            $("#h_warranty_error").html("<span class='text-danger'>Please Enter warranty!</span>");
            status = false
        }else{
            $("#hdd_warranty").removeClass("border-danger");
            $("#h_warranty_error").html("");
        }

        // for expiry date
        if(nvrExDate == ""){
            $("#nvr_ex_date").addClass("border-danger");
            $("#n_ex_error").html("<span class='text-danger'>Please Enter Expiry Date!</span>");
            status = false;
        }else{
            $("#nvr_ex_date").removeClass("border-danger");
            $("#n_ex_error").html("");
        }
        if(dvrExDate == ""){
            $("#dvr_ex_date").addClass("border-danger");
            $("#d_ex_error").html("<span class='text-danger'>Please Enter Expiry Date!</span>")
            status = false;
        }else{
            $("#dvr_ex_date").removeClass("border-danger");
            $("#d_ex_error").html("");
        }
        if(hddExDate == ""){
            $("#hdd_ex_date").addClass("border-danger");
            $("#h_ex_error").html("<span class='text-danger'>Please Enter Expiry Date!</span>")
            status = false;
        }else{
            $("#hdd_ex_date").removeClass("border-danger");
            $("#h_ex_error").html("");
        }
    if(status){
        $.ajax({
            url: DOMAIN+"/includes/process.php",
            method: "POST",
            data: $("#combo_form").serialize(),
            success: function(data) {
                if(data.trim() === '"DEVICE_ADDED"'){
                    $("#device_success").html("<span class='text-success'>NVR/DVR/HDD successfully added</span>");
                }else{
                    alert("error");
                }
            }
        })
    }
})


//expiry date calculation


function calculateExpiryDate(purchaseDate,warranty){
    var expiryDate = new Date(purchaseDate);
    expiryDate.setFullYear(expiryDate.getFullYear() + parseInt(warranty));
    return expiryDate.toISOString().split('T')[0];
}

$("#nvr_cal").on("click", function() {
    var nvrPurchaseDate = $("#nvr_purchase_date").val();
    var nvrWarranty = $("#nvr_warranty").val();

    if (nvrWarranty && nvrPurchaseDate) {
        $("#nvr_ex_date").val(calculateExpiryDate(nvrPurchaseDate, nvrWarranty));
    }
});
$("#dvr_cal").on("click", function() {
    var dvrPurchaseDate = $("#dvr_purchase_date").val();
    var dvrWarranty = $("#dvr_warranty").val();

    if (dvrWarranty && dvrPurchaseDate) {
        $("#dvr_ex_date").val(calculateExpiryDate(dvrPurchaseDate, dvrWarranty));
    }
});
$("#hdd_cal").on("click", function() {
    var hddPurchaseDate = $("#hdd_purchase_date").val();
    var hddWarranty = $("#hdd_warranty").val();

    if (hddWarranty && hddPurchaseDate) {
        $("#hdd_ex_date").val(calculateExpiryDate(hddPurchaseDate, hddWarranty));
    }
});
$("#cal").on("click", function() {
    var hddPurchaseDate = $("#purchase_date").val();
    var hddWarranty = $("#warranty").val();

    if (hddWarranty && hddPurchaseDate) {
        $("#ex_date").val(calculateExpiryDate(hddPurchaseDate, hddWarranty));
    }
});
$("#nvr_cal").on("click", function() {
    var hddPurchaseDate = $("#new_nvr_purchase_date").val();
    var hddWarranty = $("#new_nvr_warranty").val();

    if (hddWarranty && hddPurchaseDate) {
        $("#new_nvr_ex_date").val(calculateExpiryDate(hddPurchaseDate, hddWarranty));
    }
});
$("#dvr_cal").on("click", function() {
    var hddPurchaseDate = $("#new_dvr_purchase_date").val();
    var hddWarranty = $("#new_dvr_warranty").val();

    if (hddWarranty && hddPurchaseDate) {
        $("#new_dvr_ex_date").val(calculateExpiryDate(hddPurchaseDate, hddWarranty));
    }
});
$("#hdd_cal").on("click", function() {
    var hddPurchaseDate = $("#new_hdd_purchase_date").val();
    var hddWarranty = $("#new_hdd_warranty").val();

    if (hddWarranty && hddPurchaseDate) {
        $("#new_hdd_ex_date").val(calculateExpiryDate(hddPurchaseDate, hddWarranty));
    }
});



    // camera form

    $("#camera_form").on("submit", function() {
        var camMake = $("#cam_make").val();
        var serialNo = $("#serial_no").val();
        var megaPixel = $("#mega_pixel").val();
        var purchaseDate = $("#purchase_date").val();
        var cameraDCat = $("#camera_d_cat").val();
        var warranty = $("#warranty").val();
        var exDate = $("#ex_date").val();
        var Ch = $("#camera_ch").val();
        var status = true;

    
        if (camMake == ""){
            $("#cam_make").addClass("border-danger");
            $("#make_error").html("<span class='text-danger'>Please Enter Make!</span>");
            status = false ;
        } else{
            $("#cam_make").removeClass("border-danger");
            $("#make_error").html("");
            
        }
        if (serialNo == ""){
            $("#serial_no").addClass("border-danger");
            $("#serial_error").html("<span class='text-danger'>Please Enter serial number!</span>");
            status = false ;
        } else{
            $("#serial_no").removeClass("border-danger");
            $("#serial_error").html("");
            
        }
        if (megaPixel == ""){
            $("#mega_pixel").addClass("border-danger");
            $("#pixel_error").html("<span class='text-danger'>Please Enter megapixel!</span>");
            status = false ;
        } else{
            $("#mega_pixel").removeClass("border-danger");
            $("#pixel_error").html("");
            
        }
        if (purchaseDate == ""){
            $("#purchase_date").addClass("border-danger");
            $("#purchase_error").html("<span class='text-danger'>Please Enter Purchase Date!</span>");
            status = false ;
        } else{
            $("#purchase_date").removeClass("border-danger");
            $("#purchase_error").html("");
            
        }

        if (cameraDCat == ""){
            $("#camera_d_cat").addClass("border-danger");
            $("#camera_d_error").html("<span class='text-danger'>Please Select Depot!</span>");
            status = false ;
        } else{
            $("#camera_d_cat").removeClass("border-danger");
            $("#camera_d_error").html("");
            
        }

        if (warranty == ""){
            $("#warranty").addClass("border-danger");
            $("#warranty_error").html("<span class='text-danger'>Please Enter warranty!</span>");
            status = false ;
        } else{
            $("#warranty").removeClass("border-danger");
            $("#warranty_error").html("");
            
        }
        if (exDate == ""){
            $("#ex_date").addClass("border-danger");
            $("#ex_error").html("<span class='text-danger'>Please Enter Expiry!</span>");
            status = false ;
        } else{
            $("#ex_date").removeClass("border-danger");
            $("#ex_error").html("");
            
        }
        if (Ch == ""){
            $("#camera_ch").addClass("border-danger");
            $("#ch_error").html("<span class='text-danger'>Please Enter Channel</span>");
            status = false ;
        } else{
            $("#camera_ch").removeClass("border-danger");
            $("#ch_error").html("");
            
        }
        if(status){
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data:  $("#camera_form").serialize(),
                success: function(data) {
                    if (data == 'CAMERA_ADDED') {
                        $("#camera_success").html("<span class='text-success'>camera added Successfully</span>");
                    }else{
                        alert(data);
                    }
                }
            })
        }
    })




   
    
})
