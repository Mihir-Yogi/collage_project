document.addEventListener("DOMContentLoaded", function() {
    // Add event listener to all "Replace" buttons
    document.querySelectorAll('.replace-btn').forEach(item => {
        item.addEventListener('click', event => {
            
            // Get the corresponding row
            const row = event.target.closest('tr');
            
            // Get the device category from the row
            const deviceCategory = row.querySelector('td:nth-child(1)').textContent.trim(); // Assuming device category is in the first column
            

            switch (deviceCategory) {
                case 'nvr':
                    $('#new_nvr').modal('show');
                    break;
                case 'dvr':
                    $('#new_dvr').modal('show');
                    break;
                case 'hdd':
                    $('#new_hdd').modal('show');
                    break;
                default:
                    // Handle other device categories if needed
                    alert('No form available for this device category');
            }
            
        });
    });
});


$(document).ready(function(){

    var DOMAIN = "http://localhost/collage_project/public_html";

$("#new_nvr_form").on("submit",function(){


    var formData = {
        active_n_d: $("#active_n_d").val(),
        active_n_c: $("#active_n_c").val(),
        new_nvr_make: $("#new_nvr_make").val(),
        new_nvr_serial_no: $("#new_nvr_serial_no").val(),
        new_nvr_purchase_date: $("#new_nvr_purchase_date").val(),
        new_nvr_warranty: $("#new_nvr_warranty").val(),
        new_nvr_ex_date: $("#new_nvr_ex_date").val()
    };
    console.log(formData);


        $.ajax({
            url : DOMAIN + "/includes/active_form.php",
            method : "POST",
            data : formData,
            success : function(data){
                if(data.trim() === "DEVICE_ADDED"){
                    $("#nvr_success").html("<span class='text-success'>new NVR successfully replaced</span>");
                }else{
                    alert("error");
                }
            }
        })
    })


    
$("#new_dvr_form").on("submit",function(){


    var formData = {
        active_d_d: $("#active_d_d").val(),
        active_d_c: $("#active_d_c").val(),
        new_dvr_make: $("#new_dvr_make").val(),
        new_dvr_serial_no: $("#new_dvr_serial_no").val(),
        new_dvr_purchase_date: $("#new_dvr_purchase_date").val(),
        new_dvr_warranty: $("#new_dvr_warranty").val(),
        new_dvr_ex_date: $("#new_dvr_ex_date").val()
    };
    console.log(formData);

        $.ajax({
            url : DOMAIN + "/includes/active_form.php",
            method : "POST",
            data : formData,
            success : function(data){
                if(data.trim() === "DEVICE_ADDED"){
                    $("#dvr_success").html("<span class='text-success'>new DVR successfully replaced</span>");
                }else{
                    alert("error");
                }
            }
        })
    })

$("#new_hdd_form").on("submit",function(){

    var formData = {
        active_h_d: $("#active_h_d").val(),
        active_h_c: $("#active_h_c").val(),
        new_hdd_make: $("#new_hdd_make").val(),
        new_hdd_serial_no: $("#new_hdd_serial_no").val(),
        new_hdd_purchase_date: $("#new_hdd_purchase_date").val(),
        new_hdd_warranty: $("#new_hdd_warranty").val(),
        new_hdd_ex_date: $("#new_hdd_ex_date").val()
    };
    console.log(formData);

        $.ajax({
            url : DOMAIN + "/includes/active_form.php",
            method : "POST",
            data : formData,
            success : function(data){
                if(data.trim() === "DEVICE_ADDED"){
                    $("#hdd_success").html("<span class='text-success'>new HDD successfully replaced</span>");
                }else{
                    alert("error");
                }
            }
        })
    })


})


