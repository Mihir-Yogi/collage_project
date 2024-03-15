<!-- camera model -->

<div class="modal fade" id="camera" tabindex="-1" aria-labelledby="camera_model" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="camera_add">Add Camera</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="category_form" onsubmit="return false">
      <div class="mb-3">
            <label>Category name</label>
            <input type="text" class="form-control" id="category_name" name="category_name">
            <small id="cat_error" class="form-text"></small>
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
