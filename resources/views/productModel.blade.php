
  <!-- Modal -->
  <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <form action="" method="POST" id="addProductModel">
        @csrf

        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Add A New Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <div class="errMsgContent mb-2">

                </div>

                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="form-group mt-3">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" name="price" id="price">
                </div>



              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary model_close_btn" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary add_product">Save Product</button>
              </div>
            </div>
          </div>
    </form>
  </div>
