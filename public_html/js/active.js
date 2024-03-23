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

$("#new_nvr").on("submit",function(){


    var formData = {
        active_n_d: $("#active_n_d").val(),
        active_n_c: $("#active_n_c").val(),
        combo_section: $("#combo_section").val(),
        nvr_make: $("#nvr_make").val(),
        nvr_serial_no: $("#nvr_serial_no").val(),
        nvr_purchase_date: $("#nvr_purchase_date").val(),
        nvr_warranty: $("#nvr_warranty").val(),
        nvr_ex_date: $("#nvr_ex_date").val()
    };

        $.ajax({
            url : DOMAIN + "/includes/process.php",
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

$("#new_hdd").on("submit",function(){


    var formData = {
        active_n_d: $("#active_h_d").val(),
        active_n_c: $("#active_h_c").val(),
        combo_section: $("#combo_section").val(),
        nvr_make: $("#hdd_make").val(),
        nvr_serial_no: $("#hdd_serial_no").val(),
        nvr_purchase_date: $("#hdd_purchase_date").val(),
        nvr_warranty: $("#hdd_warranty").val(),
        nvr_ex_date: $("#hdd_ex_date").val()
    };

        $.ajax({
            url : DOMAIN + "/includes/process.php",
            method : "POST",
            data : formData,
            success : function(data){
                if(data.trim() === "DEVICE_ADDED"){
                    $("#hdd_success").html("<span class='text-success'>new HDDsuccessfully replaced</span>");
                }else{
                    alert("error");
                }
            }
        })
    })

$("#new_dvr").on("submit",function(){


    var formData = {
        active_n_d: $("#active_d_d").val(),
        active_n_c: $("#active_d_c").val(),
        combo_section: $("#combo_section").val(),
        nvr_make: $("#dvr_make").val(),
        nvr_serial_no: $("#dvr_serial_no").val(),
        nvr_purchase_date: $("#dvr_purchase_date").val(),
        nvr_warranty: $("#dvr_warranty").val(),
        nvr_ex_date: $("#dvr_ex_date").val()
    };

        $.ajax({
            url : DOMAIN + "/includes/process.php",
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

})


