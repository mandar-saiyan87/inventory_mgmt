<?php
include('common/nav.php');
?>
<!-- Main Content Start -->
<div class="main_content">
  <?php
  include('common/usernavbar.php');
  ?>
  <div>
    <button class="common_btn" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Product</button>
  </div>
  <div class="products_table_container table-responsive">
    <p class="table_title">Products Available</p>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">SKU</th>
          <th scope="col">Product Name</th>
          <th scope="col">Current Stock</th>
          <th scope="col">Category</th>
          <th scope="col">Price</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($products as $product) : ?>
          <tr>

            <td><?= $product["sku"] ?></td>
            <td><?= $product["name"] ?></td>
            <td><?= $product["stock"] ?></td>
            <td><?= $product["category"] ?></td>
            <td>$<?= $product["price"] ?></td>
            <td>
              <div class="btn-group">
                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">

                </button>
                <ul class="dropdown-menu">
                  <li><a href="javascript:void(0)" class="dropdown-item getdetails" data-bs-toggle="modal" data-bs-target="#productDetails" data-id="<?= $product["id"] ?>">
                      View Details
                    </a></li>
                  <li><a class="dropdown-item editproduct" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $product["id"] ?>">Edit</a></li>
                  <li><a class="dropdown-item" href="products?delid=<?= $product["id"] ?>">Delete</a></li>
                </ul>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <!---------------- Add New Product Modal Start ------------------------------------->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Product</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="products" method="POST">
            <div class="mb-3">
              <label for="exampleInputSku" class="form-label">SKU</label>
              <input type="text" class="form-control" id="exampleSku" aria-describedby="sku" name='sku'>
            </div>
            <div class="mb-3">
              <label for="exampleInputName" class="form-label">Name</label>
              <input type="text" class="form-control" id="exampleName" aria-describedby="name" name='name'>
            </div>
            <div class="mb-3">
              <label for="exampleInputName" class="form-label">Description</label>
              <textarea class="form-control" placeholder="Product description" id="floatingTextarea" name="description"></textarea>
            </div>
            <div class="mb-3">
              <label for="exampleInputName" class="form-label">Current Stock</label>
              <input type="number" class="form-control" id="exampleStock" aria-describedby="stock" name='stock'>
            </div>
            <div class="mb-3">
              <label for="exampleInputName" class="form-label">is purchase</label>
              <input type="number" class="form-control" id="examplePurchase" aria-describedby="purchase" name='purchase'>
            </div>
            <div class="mb-3">
              <label for="exampleInputName" class="form-label">is sales</label>
              <input type="number" class="form-control" id="exampleSales" aria-describedby="sales" name='sales'>
            </div>
            <div class="mb-3">
              <label for="exampleInputName" class="form-label">qty</label>
              <input type="number" class="form-control" id="exampleQty" aria-describedby="qty" name='qty'>
            </div>
            <div class="mb-3">
              <label for="exampleInputName" class="form-label">Category</label>
              <select class="form-select" aria-label="Default select example" name='category'>
                <option selected>Select Category</option>
                <?php foreach ($unique_category as $category) : ?>
                  <option value="<?= $category ?>"><?= $category ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="exampleInputName" class="form-label">price</label>
              <input type="number" class="form-control" id="examplePrice" aria-describedby="price" name='price'>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" name="addnew" class="btn btn-primary">Add to inventory</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!---------------- Add New Product Modal End ------------------------------------->

  <!------------ Product Detail Modal Start----------------------->
  <div class="modal fade" id="productDetails" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content viewProdDetails">

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!------------ Product Detail Modal Start----------------------->

  <!---------------- Edit Product Modal Start ------------------------------------->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Product</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="products?id=<?= $product["id"] ?>" method="POST">
            <div class="mb-3">
              <label for="exampleInputSku" class="form-label">SKU</label>
              <input type="text" class="form-control" id="eSku" aria-describedby="sku" name='editsku'>
            </div>
            <div class="mb-3">
              <label for="exampleInputName" class="form-label">Name</label>
              <input type="text" class="form-control" id="eName" aria-describedby="name" name='editname'>
            </div>
            <div class="mb-3">
              <label for="exampleInputName" class="form-label">Description</label>
              <textarea class="form-control" placeholder="Product description" id="eTextArea" name="editdescription"></textarea>
            </div>
            <div class="mb-3">
              <label for="exampleInputName" class="form-label">Current Stock</label>
              <input type="number" class="form-control" id="eStock" aria-describedby="stock" name='editstock'>
            </div>
            <div class="mb-3">
              <label for="exampleInputName" class="form-label">is purchase</label>
              <input type="number" class="form-control" id="ePurchase" aria-describedby="purchase" name='editpurchase'>
            </div>
            <div class="mb-3">
              <label for="exampleInputName" class="form-label">is sales</label>
              <input type="number" class="form-control" id="eSales" aria-describedby="sales" name='editsales'>
            </div>
            <div class="mb-3">
              <label for="exampleInputName" class="form-label">qty</label>
              <input type="number" class="form-control" id="eQty" aria-describedby="qty" name='editqty'>
            </div>
            <div class="mb-3">
              <label for="exampleInputName" class="form-label">Category</label>
              <select class="form-select" aria-label="Default select example" id="eCategory" name='editcategory'>
                <option selected>Select Category</option>
                <?php foreach ($unique_category as $category) : ?>
                  <option value="<?= $category ?>"><?= $category ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="exampleInputName" class="form-label">price</label>
              <input type="number" class="form-control" id="ePrice" aria-describedby="price" name='editprice'>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" name="editproduct" class="btn btn-primary">Edit Product</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!---------------- Edit Product Modal End ------------------------------------->

</div>
<!-- Main Content End -->
<?php
include('common/footer.php');
?>