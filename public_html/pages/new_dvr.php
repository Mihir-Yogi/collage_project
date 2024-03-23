
<div class="modal fade" id="new_dvr" tabindex="-1" aria-labelledby="combo_model" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-3">DVR</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
    <form id="new_dvr" onsubmit="return false">
    <div class="mb-3 row">
            <div class="col-md-4">
                <label class="form-label" for="depot">Depot</label>
                <select name="active_d_d" class="form-control" id="active_d_d">
                    <option value="">Select depot</option>
                </select>
                <small id="depot_error"></small>
            </div>
            <div class="col-md-4">
                <label class="form-label" for="child depot">category</label>
                <select name="active_d_c" class="form-control" id="active_d_c">
                    <option value=""></option>
                </select>
                <small id="category_error"></small>
            </div>

            <div class="col-md-4">
                <label for="section" class="form-label" >section</label>
                <select class="form-control" name="active_section" id="combo_section">

                <option value="1">section 1</option>
                <option value="2">section 2</option>
                </select>
                <small id="section_error"></small>
            </div>
        </div>

        <hr>

        <div class="mb-3 row">
            <div class="col-md-6">
                <label for="make">Dvr make</label>
                <input type="text" class="form-control" id="dvr_make" name="dvr_make">
                <small id="d_make_error"></small>
            </div>

            <div class="col-md-6">
                <label for="serial no">Dvr serial no</label>
                <input type="number" class="form-control" id="dvr_serial_no" name="dvr_serial_no"> 
                <small id="d_serial_error"></small>
            </div>
        </div>


        <div class="mb-3 row">   
            
            <div class="col-md-5">
                <label for="purchase date">Dvr purchase date</label>
                <input type="date" class="form-control purchase-date-input" id="dvr_purchase_date" name="dvr_purchase_date">
                <small id="d_purchase_error"></small>
            </div>
            <div class="col-md-5">
                <label for="warranty">Dvr warranty</label>
                <input type="number" class="form-control warranty-input" id="dvr_warranty"  name="dvr_warranty">
                <small id="d_warranty_error"></small>
            </div>
            <div class="col-md-2 mt-4">
                    <button type="button" class="btn btn-primary" id="dvr_cal">Calculate</button>
            </div>
        </div>


        <div class="mb-3">
            <label for="expiry date">Dvr Expiry date</label>
            <input type="date" class="form-control expiry-date-input" id="dvr_ex_date" name="dvr_ex_date" >
            <small id="d_ex_error"></small>
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
        <small id="dvr_success"></small>
    </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
    </div>
</div>