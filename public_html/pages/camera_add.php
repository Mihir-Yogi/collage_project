<!-- camera model -->

<div class="modal fade" id="camera" tabindex="-1" aria-labelledby="camera_model" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="camera_add">Add Camera</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="camera_form" onsubmit="return false">
          <div class="mb-3">
            <label>Make</label>
            <input type="text" name="make" class="form-control" id="make">
            <small id="m_error" class="form-text"></small>
          </div>
          
          <div class="mb-3">
            <label>category</label>
            <select class="form-control" id="depot_category" name="depot_category">
              
            </select>
          </div>
          
          <div class="mb-3">
            <label>serial no</label>
            <input type="number" name="serial_no" class="form-control" id="serial_no">
            <small id="s_error" class="form-text"></small>
          </div>
          
          
          <div class="mb-3">
            <label>megapixel</label>
            <input type="number" name="mega_pixel" class="form-control" id="mega_pixel">
            <small id="mp_error" class="form-text"></small>
          </div>
          
          <div class="mb-3">
            <label>purchase date</label>
            <input type="date" name="purchase_date" class="form-control" id="purchase_date">
            <small id="pd_error" class="form-text"></small>
          </div>
          
          <div class="mb-3">
            <label>Warranty</label>
            <input type="number" name="warranty" class="form-control" id="warranty">
            <small id="w_error" class="form-text"></small>
          </div>
          
          <div class="mb-3">
            <label>expiry date</label>
            <input type="date" name="ex_date" class="form-control" id="ex_date">
            <small id="ex_error" class="form-text"></small>
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>