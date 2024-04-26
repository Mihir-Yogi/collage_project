<div class="modal fade" id="child_category" tabindex="-1" aria-labelledby="category_model" aria-hidden="true">
<div class="modal-dialog modal-sm">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="category_add">Add Location</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        

        <form id="child_form" onsubmit="return false">
        

        <div class="mb-3">
            <label>Depot</label>
            <select class="form-control" id="parent_category" name="parent_category">

            </select>
            <small id="p_error" class="form-text"></small>
        </div>

        <div class="mb-3">
            <label>Location</label>
            <input type="text" class="form-control" id="child_name" name="child_name">
            <small id="c_error" class="form-text"></small>
        </div>
        <button type="child_submit" class="btn btn-primary">Add</button>
        </form>


    </div>
    <div class="modal-footer">
    <button class="btn btn-primary" data-bs-target="#parent" data-bs-toggle="modal">Add Depot</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    </div>
    </div>
</div>
</div>