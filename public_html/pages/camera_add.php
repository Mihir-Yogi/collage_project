
<!-- camera Modal -->
<div class="modal fade" id="camera" tabindex="-1" aria-labelledby="camera_model" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5">Add camera</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
    <form>
        <div class="mb-3 row">
            <div class="col-md-6">
                <label for="make" class="form-label">make</label>
                <input type="text" class="form-control" id="cam_make" aria-describedby="cam_make">
            </div>

            <div class="col-md-6">
                <label for="serial no" class="form-label">serial no</label>
                <input type="number" class="form-control" id="serial_no"> 
            </div>
        </div>
        
        <div class="mb-3 row">
            <div class="col-md-6">
                <label for="megapixel" class="form-label">megapixel</label>
                <input type="number" class="form-control" id="mega_pixel">
                
            </div>
            
            <div class="col-md-6">
                <label for="purchase date" class="form-label">purchase date</label>
                <input type="date" class="form-control" id="purchase_date">

            </div>


        </div>
        

        <div class="mb-3 row">
            <div class="col-md-6">
                <label for="depot">Depot</label>
                <select name="camera_d_cat" class="form-control" id="camera_d_cat">
                    <option value="">Select depot</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="child depot">category</label>
                <select name="child_depot" class="form-control" id="camera_c_depot">
                    <option value=""></option>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label for="warranty">warranty</label>
            <input type="number" class="form-control" id="warranty">

        </div>
        
        <div class="mb-3">
            <label for="expiry date">Expiry date</label>
            <input type="date" class="form-control" id="ex_date">

        </div>
        

        <button type="submit" class="btn btn-success">Submit</button>
    </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
    </div>
</div>
