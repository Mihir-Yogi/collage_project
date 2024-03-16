
<!-- camera Modal -->
<div class="modal fade" id="camera" tabindex="-1" aria-labelledby="camera_model" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5">Add camera</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
    <form id="camera_form" onsubmit="return false">
        <div class="mb-3 row">
            <div class="col-md-6">
                <label for="make" class="form-label">make</label>
                <input type="text" class="form-control" id="cam_make" name="cam_make" aria-describedby="cam_make">
                <small id="make_error"></small>
            </div>

            <div class="col-md-6">
                <label for="serial no" class="form-label">serial no</label>
                <input type="number" class="form-control" id="serial_no" name="serial_no"> 
                <small id="serial_error"></small>
            </div>
        </div>
        
        <div class="mb-3 row">
            <div class="col-md-6">
                <label for="megapixel" class="form-label">megapixel</label>
                <input type="number" class="form-control" id="mega_pixel" name="mega_pixel" >
                <small id="pixel_error"></small>
            </div>
            
            <div class="col-md-6">
                <label for="purchase date" class="form-label">purchase date</label>
                <input type="date" class="form-control" id="purchase_date" name="purchase_date" >
                <small id="purchase_error"></small>
            </div>


        </div>
        

        <div class="mb-3 row">
            <div class="col-md-6">
                <label for="depot">Depot</label>
                <select name="camera_d_cat" class="form-control" id="camera_d_cat">
                    <option value="">Select depot</option>
                </select>
                <small id="camera_d_error"></small>
            </div>
            <div class="col-md-6">
                <label for="child depot">category</label>
                <select name="camera_c_depot" class="form-control" id="camera_c_depot">
                    <option value=""></option>
                </select>
                <small id="camera_c_error"></small>
            </div>
        </div>
        <div class="mb-3">
            <label for="warranty">warranty</label>
            <input type="number" class="form-control" id="warranty" name="warranty">
            <small id="warranty_error"></small>
        </div>
        
        <div class="mb-3">
            <label for="expiry date">Expiry date</label>
            <input type="date" class="form-control" id="ex_date" name="ex_date" >
            <small id="ex_error"></small>
        </div>
        

        <button type="submit" class="btn btn-success">Submit</button>
        <button type="button" id="clear_button" class="btn btn-danger">clear</button>
        <small id="camera_success"></small>
    </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
    </div>
</div>
