
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
                <label for="depot">Depot</label>
                <select name="camera_d_cat" class="form-control" id="camera_d_cat">
                    <option value="">Select Depot</option>
                </select>
                <small id="camera_d_error"></small>
            </div>
            <div class="col-md-6">
                <label for="child depot">Location</label>
                <select name="camera_c_depot" class="form-control" id="camera_c_depot">
                    <option value=""></option>
                </select>
                <small id="camera_c_error"></small>
            </div>
        </div>

        <hr>

        <div class="mb-3 row">
            <div class="col-md-4">
                <label for="make" class="form-label">make</label>
                <input type="text" class="form-control" id="cam_make" name="cam_make" aria-describedby="cam_make">
                <small id="make_error"></small>
            </div>

            <div class="col-md-4">
                <label for="serial no" class="form-label">serial no</label>
                <input type="number" class="form-control" id="serial_no" name="serial_no"> 
                <small id="serial_error"></small>
            </div>
            <div class="col-md-4">
                <label class="form-label" >CH</label>
                <select class="form-control" name="camera_ch" id="camera_ch">

                <option value="">Select CH</option>
                <option value="1">Ch - 1</option>
                <option value="2">Ch - 2</option>
                <option value="3">Ch - 3</option>
                <option value="4">Ch - 4</option>
                <option value="4">Ch - 4</option>
                <option value="5">Ch - 5</option>
                <option value="6">Ch - 6</option>
                <option value="7">Ch - 7</option>
                <option value="8">Ch - 8</option>
                <option value="9">Ch - 9</option>
                <option value="10">Ch - 10</option>
                <option value="11">Ch - 11</option>
                <option value="12">Ch - 12</option>
                <option value="13">Ch - 13</option>
                <option value="14">Ch - 14</option>
                <option value="15">Ch - 15</option>
                <option value="16">Ch - 16</option>
                </select>
                <small id="ch_error"></small>
            </div>

        </div>
        

        
        <div class="mb-3 row">
            <div class="col-md-4">
                <label for="megapixel" class="form-label">megapixel</label>
                <input type="number" class="form-control" id="mega_pixel" name="mega_pixel" >
                <small id="pixel_error"></small>
            </div>

            <div class="col-md-4">
                <label for="purchase date">purchase date</label>
                <input type="date" class="form-control purchase-date-input" id="purchase_date" name="purchase_date">
                <small id="purchase_error"></small>
            </div>
            <div class="col-md-4">
                <label for="warranty">warranty</label>
                <input type="number" class="form-control warranty-input" id="warranty"  name="warranty"> 
                <small id="warranty_error"></small>
            </div>

        </div>
        <div class="mb-3 row">
            
            <div class="col-md-5">
                <label> Camera Location</label>
                <input type="text" class="form-control" id="location"  name="location"> 
                <small id="l_error"></small>
            </div>

            <div class="col-md-5">
            <label for="expiry date">Expiry date</label>
            <input type="date" class="form-control" id="ex_date" name="ex_date" >
            <small id="ex_error"></small>
            </div>

            <div class="col-md-2  mt-4">
                <button type="button" class="btn btn-primary" id="cal">Calculate</button>
            </div>
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

