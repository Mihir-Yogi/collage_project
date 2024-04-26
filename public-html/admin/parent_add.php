<!-- camera model -->

<div class="modal fade" id="parent" tabindex="-1" aria-labelledby="parent_model" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="camera_add">Add Depot</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="category_form" onsubmit="return false">
      <div class="mb-3">
            <label>Depot</label>
            <input type="text" class="form-control" id="category_name" name="category_name">
            <small id="cat_error" class="form-text"></small>
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
      </form>

      </div>
      <div class="modal-footer">
      <button class="btn btn-primary" data-bs-target="#child_category" data-bs-toggle="modal">Add location</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
