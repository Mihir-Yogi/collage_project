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
                    if (data == "CATEGORY_ADDED") {
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
                    }else{
                        $("#camera_d_cat").append(data);
                        $("#combo_d_cat").append(data);
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

        loadData();


    //for clear button
    $("#clear_button").on("click", function() {
        // Clear all input fields
        $("#cam_make").val("");
        $("#serial_no").val("");
        $("#mega_pixel").val("");
        $("#purchase_date").val("");
        $("#camera_d_cat").val("");
        $("#camera_c_depot").val("");
        $("#warranty").val("");
        $("#ex_date").val("");
        
        // Clear any error messages
        $("small[id$='_error']").empty();
        
        // Remove any error styling
        $("input").removeClass("border-danger");
    });


    //combo form

    $("#combo_form").on("submit", function(){

        var formData = $(this).serialize();
        console.log("Form data:", formData);

        var comboDepotCategory = $("#combo_d_cat").val();
        var comboCategoryDepot = $("#combo_c_depot").val();
        var section = $("#combo_section").val();

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

    if(status){
        $.ajax({
            url: DOMAIN+"/includes/combo.php",
            method: "POST",
            data: formData,
            success: function(response) {

                var data = JSON.parse(response);
        if(data.nvr_result === "NVR_ADDED") {
            // Handle NVR added
            $("#nvr_success").html("<span class='text-success'>NVR is successfully added</span><br>");
        } else {
            // Handle NVR not added
            $("#nvr_success").html("<span class='text-danger'>NVR is not added</span>");
        }

        if(data.dvr_result === "DVR_ADDED") {
            $("#dvr_success").html("<span class='text-success'>dvr is successfully added</span> <br>");
        } else {
            $("#dvr_success").html("<span class='text-danger'>dvr is not added</span>");
        }

        if(data.hdd_result === "HDD_ADDED") {
            $("#hdd_success").html("<span class='text-success'>hdd is successfully added</span>");
        } else {
            $("#hdd_success").html("<span class='text-danger'>hdd is not added</span>");
        }
            }
        })
    }
})

    // camera form

    $("#camera_form").on("submit", function() {
        var camMake = $("#cam_make").val();
        var serialNo = $("#serial_no").val();
        var megaPixel = $("#mega_pixel").val();
        var purchaseDate = $("#purchase_date").val();
        var cameraDCat = $("#camera_d_cat").val();
        var cameraCDepot = $("#camera_c_depot").val();
        var warranty = $("#warranty").val();
        var exDate = $("#ex_date").val();
        var status = false;

    
        if (camMake == ""){
            $("#cam_make").addClass("border-danger");
            $("#make_error").html("<span class='text-danger'>Please Enter Make!</span>");
            status = false ;
        } else{
            $("#cam_make").removeClass("border-danger");
            $("#make_error").html("");
            status = true;
        }
        if (serialNo == ""){
            $("#serial_no").addClass("border-danger");
            $("#serial_error").html("<span class='text-danger'>Please Enter serial number!</span>");
            status = false ;
        } else{
            $("#serial_no").removeClass("border-danger");
            $("#serial_error").html("");
            status = true;
        }
        if (megaPixel == ""){
            $("#mega_pixel").addClass("border-danger");
            $("#pixel_error").html("<span class='text-danger'>Please Enter megapixel!</span>");
            status = false ;
        } else{
            $("#mega_pixel").removeClass("border-danger");
            $("#pixel_error").html("");
            status = true;
        }
        if (purchaseDate == ""){
            $("#purchase_date").addClass("border-danger");
            $("#purchase_error").html("<span class='text-danger'>Please Enter Purchase Date!</span>");
            status = false ;
        } else{
            $("#purchase_date").removeClass("border-danger");
            $("#purchase_error").html("");
            status = true;
        }
        if (cameraDCat == ""){
            $("#camera_d_cat").addClass("border-danger");
            $("#camera_d_error").html("<span class='text-danger'>Please Select Depot!</span>");
            status = false ;
        } else{
            $("#camera_d_cat").removeClass("border-danger");
            $("#camera_d_error").html("");
            status = true;
        }
        if (cameraCDepot == ""){
            $("#camera_c_depot").addClass("border-danger");
            $("#camera_c_error").html("<span class='text-danger'>Please Select Category!</span>");
            status = false ;
        } else{
            $("#camera_c_depot").removeClass("border-danger");
            $("#camera_C_error").html("");
            status = true;
        }
        if (warranty == ""){
            $("#warranty").addClass("border-danger");
            $("#warranty_error").html("<span class='text-danger'>Please Enter warranty!</span>");
            status = false ;
        } else{
            $("#warranty").removeClass("border-danger");
            $("#warranty_error").html("");
            status = true;
        }
        if (exDate == ""){
            $("#ex_date").addClass("border-danger");
            $("#ex_error").html("<span class='text-danger'>Please Enter Expiry!</span>");
            status = false ;
        } else{
            $("#ex_date").removeClass("border-danger");
            $("#ex_error").html("");
            status = true;
        }
        if(status){
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data:  $("#camera_form").serialize(),
                success: function(data) {
                    if (data == "CAMERA_ADDED") {
                        $("#camera_success").html("<span class='text-success'>Camera Successfully added.</span>")
                    }else{
                        alert(data);
                    }
                }
            })
        }
    })


// for active and de-active status and get data into table

// Call the fetchData function when any dropdown value changes
$('#combo_d_cat, #combo_c_depot, #combo_section').change(function() {
    fetchData();
});

// Function to fetch data based on selected values
function fetchData() {
    var depot = $('#combo_d_cat').val();
    var category = $('#combo_c_depot').val();
    var section = $('#combo_section').val();

    // Make an AJAX request
    $.ajax({
        url: DOMAIN + "/includes/process.php",
        method: "POST",
        data: { depot: depot, category: category, section: section },
        success: function(data) {
            $('#data_table tbody').empty(); // Clear table body before appending new data

            var data = JSON.parse(data); // Parse JSON response

            // Loop through the fetched data and append rows to the table
            $.each(data, function(index, item) {
                var row = '<tr>' +
                    '<td>' + item.make + '</td>' +
                    '<td>' + item.serial_no + '</td>' +
                    '<td>' + item.purchase_date + '</td>' +
                    '<td>' + item.warranty + '</td>' +
                    '<td>' + item.expiry_date + '</td>' +
                    '<td>' + item.status + '</td>' +
                    '</tr>';

                $("#data_table tbody").append(row); // Append row to table body
            });
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

    
})
