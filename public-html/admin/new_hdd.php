<div class="modal fade" id="new_hdd" tabindex="-1" aria-labelledby="combo_model" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-3">HDD</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
    <form  id="new_hdd_form" onsubmit="return false">

    <div class="mb-3 row">
            <div class="col-md-6">
                <label class="form-label" for="depot">Depot</label>
                <select name="active_h_d" class="form-control" id="active_h_d">
                    <option value="">Select Depot</option>
                </select>
                <small id="depot_error"></small>
            </div>
            <div class="col-md-6">
                <label class="form-label" for="child depot">Location</label>
                <select name="active_h_c" class="form-control" id="active_h_c">
                    <option value=""></option>
                </select>
                <small id="category_error"></small>
            </div>
        </div>

        <div class="mb-3 row">
            <div class="col-md-6">
                <label for="make">Hdd make</label>
                <input type="text" class="form-control" id="new_hdd_make" name="new_hdd_make">
                <small id="h_make_error"></small>
            </div>

            <div class="col-md-6">
                <label for="serial no">Hdd serial no</label>
                <input type="number" class="form-control" id="new_hdd_serial_no" name="new_hdd_serial_no">
                <small id="h_serial_error"></small> 
            </div>
        </div>
        
        <div class="mb-3 row">
            <div class="col-md-5">
                <label for="purchase date">Hdd purchase date</label>
                <input type="date" class="form-control purchase-date-input" id="new_hdd_purchase_date" name="new_hdd_purchase_date">
                <small id="h_purchase_error"></small>
            </div>
            <div class="col-md-5">
                <label for="warranty">Hdd warranty</label>
                <input type="number" class="form-control warranty-input" id="new_hdd_warranty"  name="new_hdd_warranty"> 
                <small id="h_warranty_error"></small>
            </div>

            <div class="col-md-2 mt-4">
                <button type="button" class="btn btn-primary" id="hdd_cal">Calculate</button>
            </div>
        </div>
        
        <div class="mb-3">
            <label for="expiry date">Hdd Expiry date</label>
            <input type="date" class="form-control expiry-date-input" id="new_hdd_ex_date" name="new_hdd_ex_date" >
            <small id="h_ex_error"></small>
        </div>

        
        <button type="submit" class="btn btn-success">Submit</button>
        <button type="button" id="clear_hdd" class="btn btn-danger">clear</button>
        <small id="hdd_success"></small>
    </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
    </div>
</div>