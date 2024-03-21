<!-- hdd Modal -->
<div class="modal fade" id="combo" tabindex="-1" aria-labelledby="combo_model" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5">Add NVR</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
    <form id="combo_form" onsubmit="return false">

    <div class="mb-3 row">
            <div class="col-md-4">
                <label class="form-label" for="depot">Depot</label>
                <select name="combo_d_cat" class="form-control" id="combo_d_cat">
                    <option value="">Select depot</option>
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label" for="child depot">category</label>
                <select name="combo_c_depot" class="form-control" id="combo_c_depot">
                    <option value=""></option>
                </select>
            </div>

            <div class="col-md-4">
                <label for="section" class="form-label" >section</label>
                <select class="form-control" name="combo_section" id="combo_section">

                <option value="1">section 1</option>
                <option value="2">section 2</option>
                </select>
            </div>
        </div>


        <hr>

        <h4>NVR</h4>

        <div class="mb-3 row">
            <div class="col-md-6">
                <label for="make" class="form-label">Nvr make</label>
                <input type="text" class="form-control" name="nvr_make" id="nvr_make">
            </div>

            <div class="col-md-6">
                <label for="serial no" class="form-label">Nvr serial no</label>
                <input type="number" class="form-control" name="nvr_serial_no" id="nvr_serial_no"> 
            </div>
        </div>
        
        <div class="mb-3 row">
            <div class="col-md-6">
                <label for="purchase date" class="form-label">Nvr purchase date</label>
                <input type="date" class="form-control" name="nvr_purchase_date" id="nvr_purchase_date">
            </div>
        </div>
        
        <div class="mb-3">
            <label for="warranty">Nvr warranty</label>
            <input type="number" class="form-control" name="nvr_warranty" id="nvr_warranty">

        </div>
        
        <div class="mb-3">
            <label for="expiry date">Nvr Expiry date</label>
            <input type="date" class="form-control" name="nvr_ex_date" id="nvr_ex_date">

        </div>


        <hr>

        <h4>DVR</h4>

        <div class="mb-3 row">
            <div class="col-md-6">
                <label for="make" class="form-label">Dvr make</label>
                <input type="text" class="form-control" id="dvr_make" name="dvr_make">
            </div>

            <div class="col-md-6">
                <label for="serial no" class="form-label">Dvr serial no</label>
                <input type="number" class="form-control" id="dvr_serial_no" name="dvr_serial_no"> 
            </div>
        </div>
        
        <div class="mb-3 row">
            <div class="col-md-6">
                <label for="purchase date" class="form-label">Dvr purchase date</label>
                <input type="date" class="form-control" id="dvr_purchase_date" name="dvr_purchase_date">
            </div>
        </div>
        
        <div class="mb-3">
            <label for="warranty">Dvr warranty</label>
            <input type="number" class="form-control" id="dvr_warranty" name="dvr_warranty">

        </div>
        
        <div class="mb-3">
            <label for="expiry date">Dvr Expiry date</label>
            <input type="date" class="form-control" id="dvr_ex_date" name="dvr_ex_date">

        </div>


        <hr>

        <h4>HDD</h4>

        <div class="mb-3 row">
            <div class="col-md-6">
                <label for="make" class="form-label">Hdd make</label>
                <input type="text" class="form-control" id="hdd_make" name="hdd_make">
            </div>

            <div class="col-md-6">
                <label for="serial no" class="form-label">Hdd serial no</label>
                <input type="number" class="form-control" id="hdd_serial_no" name="hdd_serial_no"> 
            </div>
        </div>
        
        <div class="mb-3 row">
            <div class="col-md-6">
                <label for="purchase date" class="form-label">Hdd purchase date</label>
                <input type="date" class="form-control" id="hdd_purchase_date" name="hdd_purchase_date">
            </div>
        </div>
        
        <div class="mb-3">
            <label for="warranty">Hdd warranty</label>
            <input type="number" class="form-control" id="hdd_warranty" name="hdd_warranty"> 

        </div>
        
        <div class="mb-3">
            <label for="expiry date">Hdd Expiry date</label>
            <input type="date" class="form-control" id="hdd_ex_date" name="hdd_ex_date">

        </div>

        
        

        <button type="submit" class="btn btn-success">Submit</button><br>
        <small id="nvr_success"></small>
        <small id="dvr_success"></small>
        <small id="hdd_success"></small>
    </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
    </div>
</div>