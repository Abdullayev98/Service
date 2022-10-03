<!-- Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <form action="" method="post" id="addProductForm" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                    <label for="name">Product name</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="form-group mt-2">
                    <label for="price">Product price</label>
                    <input type="number" class="form-control" name="price" id="price">
                </div>
                <div class="form-group mt-2">
                    <label for="image">Choose product image</label>
                    <input type="file" class="form-control" name="image" id="image">
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary add_product">Save Product</button>
              </div>
            </div>
          </div>
    </form>
  </div>