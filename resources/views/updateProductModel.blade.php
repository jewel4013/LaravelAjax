
  <!-- Modal -->
  <div class="modal fade" id="updateProductModal" tabindex="-1" aria-labelledby="updateProductModalLabel" aria-hidden="true">
    <form action="" method="POST" id="updateProductModel">
        @csrf
        <input type="hidden" id="up_id">

        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="updateProductModalLabel">Update Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <div class="errMsgContent mb-2">

                </div>

                <div class="form-group">
                    <label for="up_name">Product Name</label>
                    <input type="text" class="form-control" name="up_name" id="up_name">
                </div>
                <div class="form-group mt-3">
                    <label for="up_price">Price</label>
                    <input type="number" class="form-control" name="up_price" id="up_price">
                </div>



              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary model_close_btn" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary update_product">Update Product</button>
              </div>
            </div>
          </div>
    </form>
  </div>
