<!-- category model  -->

<div class="modal fade" id="category" tabindex="-1" aria-labelledby="category_model" aria-hidden="true">
<div class="modal-dialog modal-sm">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="category_add">Add Category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        

        <form id="category_form" onsubmit="return false">
        <div class="mb-3">
            <label>Category name</label>
            <input type="text" class="form-control" id="category_name" name="category_name">
            <small id="cat_error" class="form-text"></small>
        </div>

        <div class="mb-3">
            <label>category</label>
            <select class="form-control" id="depot_category" name="depot_category">

            </select>
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