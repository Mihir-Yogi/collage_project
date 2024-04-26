
<div class="modal fade" id="new_dvr" tabindex="-1" aria-labelledby="combo_model" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-3">DVR</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
    <form id="new_dvr_form" onsubmit="return false">

        <div class="mb-3 row">
            <div class="col-md-6">
                <label class="form-label" for="depot">Depot</label>
                <select name="active_d_d" class="form-control" id="active_d_d">
                    <option value="">Select Depot</option>
                </select>
                <small id="depot_error"></small>
            </div>
            <div class="col-md-6">
                <label class="form-label" for="child depot">Location</label>
                <select name="active_d_c" class="form-control" id="active_d_c">
                    <option value=""></option>
                </select>
                <small id="category_error"></small>
            </div>
        </div>

        <div class="mb-3 row">
            <div class="col-md-6">
                <label for="make" >dvr make</label>
                <input type="text" class="form-control" name="new_dvr_make" id="new_dvr_make">
                <small id="n_make_error"></small>
            </div>

            <div class="col-md-6">
                <label for="serial no" >dvr serial no</label>
                <input type="number" class="form-control" name="new_dvr_serial_no" id="new_dvr_serial_no"> 
                <small id="n_serial_error"></small>
            </div>
        </div>
        
        
        <div class="mb-3 row align-item-center">
            <div class="col-md-5">
                <label for="purchase date"  >dvr purchase date</label>
                <input type="date" class="form-control purchase-date-input" name="new_dvr_purchase_date" id="new_dvr_purchase_date">
                <small id="n_purchase_error"></small>
            </div>

            <div class="col-md-5">
                <label for="warranty" >Nvr warranty</label>
                <input type="number" class="form-control warranty-input" name="new_dvr_warranty"    id="new_dvr_warranty">
                <small id="d_warranty_error"></small>
            </div>
            <div class="col-md-2 mt-4">
                <button type="button" class="btn btn-primary" id="dvr_cal">Calculate</button>
            </div>
        </div>
        
        <div class="mb-3">
            <label for="expiry date">Nvr Expiry date</label>
            <input type="date" class="form-control expiry-date-input" name="new_dvr_ex_date" id="new_dvr_ex_date" >
            <small id="n_ex_error"></small>
        </div>


        
        
        

        <button type="submit" class="btn btn-success">Submit</button>
        <button type="button" id="clear_dvr" class="btn btn-danger">clear</button>
        <small id="dvr_success"></small>
    </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
    </div>
</div>