
<!-- hdd Modal -->
<div class="modal fade" id="combo" tabindex="-1" aria-labelledby="combo_model" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5">Add NVR/DVR/HDD</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
    <form id="combo_form" onsubmit="return false">

    <div class="mb-3 row">
            <div class="col-md-6">
                <label class="form-label" for="depot">Depot</label>
                <select name="combo_d_cat" class="form-control" id="combo_d_cat">
                    <option value="">Select Depot</option>
                </select>
                <small id="depot_error"></small>
            </div>
            <div class="col-md-6">
                <label class="form-label" for="child depot">Location</label>
                <select name="combo_c_depot" class="form-control" id="combo_c_depot">
                    <option value=""></option>
                </select>
                <small id="category_error"></small>
            </div>

        </div>


        <hr>

        <h4 id="nvr" name="nvr" >NVR</h4>

        <div class="mb-3 row">
            <div class="col-md-4">
                <label for="make" >Nvr make</label>
                <input type="text" class="form-control" name="nvr_make" id="nvr_make">
                <small id="n_make_error"></small>
            </div>

            <div class="col-md-4">
                <label for="serial no" >Nvr serial no</label>
                <input type="number" class="form-control" name="nvr_serial_no" id="nvr_serial_no"> 
                <small id="n_serial_error"></small>
            </div>

            <div class="col-md-4">
                <label  class="form-label" >CH</label>
                <select class="form-control" name="combo_ch" id="combo_ch">

                <option value="4">Ch - 4</option>
                <option value="8">Ch - 8</option>
                <option value="16">Ch - 16</option>
                </select>
                <small id="ch_error"></small>
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


        <hr>

        <h4 id="dvr" name="dvr">DVR</h4>

        <div class="mb-3 row">
            <div class="col-md-4">
                <label for="make">Dvr make</label>
                <input type="text" class="form-control" id="dvr_make" name="dvr_make">
                <small id="d_make_error"></small>
            </div>

            <div class="col-md-4">
                <label for="serial no">Dvr serial no</label>
                <input type="number" class="form-control" id="dvr_serial_no" name="dvr_serial_no"> 
                <small id="d_serial_error"></small>
            </div>

            <div class="col-md-4">
                <label>CH</label>
                <select class="form-control" name="dvr_ch" id="dvr_ch">

                <option value="4">Ch - 4</option>
                <option value="8">Ch - 8</option>
                <option value="16">Ch - 16</option>
                </select>
                <small id="dvr_ch_error"></small>
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


        <hr>

        <h4 id="hdd" name="hdd">HDD</h4>

        <div class="mb-3 row">
            <div class="col-md-6">
                <label for="make">Hdd make</label>
                <input type="text" class="form-control" id="hdd_make" name="hdd_make">
                <small id="h_make_error"></small>
            </div>

            <div class="col-md-6">
                <label for="serial no">Hdd serial no</label>
                <input type="number" class="form-control" id="hdd_serial_no" name="hdd_serial_no">
                <small id="h_serial_error"></small> 
            </div>
        </div>
        
        <div class="mb-3 row">
            <div class="col-md-5">
                <label for="purchase date">Hdd purchase date</label>
                <input type="date" class="form-control purchase-date-input" id="hdd_purchase_date" name="hdd_purchase_date">
                <small id="h_purchase_error"></small>
            </div>
            <div class="col-md-5">
                <label for="warranty">Hdd warranty</label>
                <input type="number" class="form-control warranty-input" id="hdd_warranty"  name="hdd_warranty"> 
                <small id="h_warranty_error"></small>
            </div>

            <div class="col-md-2 mt-4">
                <button type="button" class="btn btn-primary" id="hdd_cal">Calculate</button>
            </div>
        </div>
        
        <div class="mb-3">
            <label for="expiry date">Hdd Expiry date</label>
            <input type="date" class="form-control expiry-date-input" id="hdd_ex_date" name="hdd_ex_date" >
            <small id="h_ex_error"></small>
        </div>

        
        

        <button type="submit" class="btn btn-success">Submit</button>
        <button type="button" id="clear_combo" class="btn btn-danger">clear</button>
        <small id="device_success"></small>

    </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
    </div>
</div>