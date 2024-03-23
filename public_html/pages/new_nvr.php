
<div class="modal fade" id="new_nvr" tabindex="-1" aria-labelledby="combo_model" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-3">NVR</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
    <form onsubmit="return false">

        <div class="mb-3 row">
            <div class="col-md-4">
                <label class="form-label" for="depot">Depot</label>
                <select name="active_n_d" class="form-control" id="active_n_d">
                    <option value="">Select depot</option>
                </select>
                <small id="depot_error"></small>
            </div>
            <div class="col-md-4">
                <label class="form-label" for="child depot">category</label>
                <select name="active_n_c" class="form-control" id="active_n_c">
                    <option value=""></option>
                </select>
                <small id="category_error"></small>
            </div>

            <div class="col-md-4">
                <label for="section" class="form-label" >section</label>
                <select class="form-control" name="combo_section" id="combo_section">

                <option value="1">section 1</option>
                <option value="2">section 2</option>
                </select>
                <small id="section_error"></small>
            </div>
        </div>

        <div class="mb-3 row">
            <div class="col-md-6">
                <label for="make" >Nvr make</label>
                <input type="text" class="form-control" name="nvr_make" id="nvr_make">
                <small id="n_make_error"></small>
            </div>

            <div class="col-md-6">
                <label for="serial no" >Nvr serial no</label>
                <input type="number" class="form-control" name="nvr_serial_no" id="nvr_serial_no"> 
                <small id="n_serial_error"></small>
            </div>
        </div>
        
        
        <div class="mb-3 row align-item-center">
            <div class="col-md-5">
                <label for="purchase date"  >Nvr purchase date</label>
                <input type="date" class="form-control purchase-date-input" name="nvr_purchase_date" id="nvr_purchase_date">
                <small id="n_purchase_error"></small>
            </div>

            <div class="col-md-5">
                <label for="warranty" >Nvr warranty</label>
                <input type="number" class="form-control warranty-input" name="nvr_warranty"    id="nvr_warranty">
                <small id="n_warranty_error"></small>
            </div>
            <div class="col-md-2 mt-4">
                <button type="button" class="btn btn-primary" id="nvr_cal">Calculate</button>
            </div>
        </div>
        
        <div class="mb-3">
            <label for="expiry date">Nvr Expiry date</label>
            <input type="date" class="form-control expiry-date-input" name="nvr_ex_date" id="nvr_ex_date" >
            <small id="n_ex_error"></small>
        </div>


        
        
        

        <button type="submit" class="btn btn-success">Submit</button>
        <small id="nvr_success"></small>
    </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
    </div>
</div>