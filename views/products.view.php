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

            <td><?php echo $product["sku"] ?></td>
            <td><?php echo $product["name"] ?></td>
            <td><?php echo $product["stock"] ?></td>
            <td><?php echo $product["category"] ?></td>
            <td><?php echo $product["price"] ?></td>
            <td>
              <div class="btn-group">
                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">

                </button>
                <ul class="dropdown-menu">
                  <li><a href="javascript:void(0)" class="dropdown-item getdetails" data-bs-toggle="modal" data-bs-target="#productDetails" data-id="<?= $product["id"] ?>">
                      View Details
                    </a></li>
                  <li><a class="dropdown-item" href="#">Edit</a></li>
                  <li><a class="dropdown-item" href="#">Delete</a></li>
                </ul>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="exampleInputSku" class="form-label">SKU</label>
              <input type="text" class="form-control" id="exampleSku" aria-describedby="sku">
            </div>
            <div class="mb-3">
              <label for="exampleInputName" class="form-label">Name</label>
              <input type="text" class="form-control" id="exampleName" aria-describedby="name">
            </div>
            <div class="mb-3">
              <label for="exampleInputName" class="form-label">Current Stock</label>
              <input type="number" class="form-control" id="exampleName" aria-describedby="stock">
            </div>
            <div class="mb-3">
              <label for="exampleInputName" class="form-label">Category</label>
              <select class="form-select" aria-label="Default select example">
                <option selected>Select Category</option>
                <?php foreach ($unique_category as $category) : ?>
                  <option value="<?= $category ?>"><?= $category ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="exampleInputName" class="form-label">price</label>
              <input type="number" class="form-control" id="examplePrice" aria-describedby="price">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Add to inventory</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="productDetails" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"><?= $prodDetails["sku"] ?></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div>
            <p>Prduct Name: <?= $prodDetails["name"] ?></p>
            <p>Prduct Category: <?= $prodDetails["category"] ?></p>
            <p>Prduct Details: <?= $prodDetails["description"] ?></p>
            <p>Prduct Stock: <?= $prodDetails["stock"] ?></p>
            <p>Prduct Price: <?= $prodDetails["price"] ?></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Main Content End -->
<?php
include('common/footer.php');
?>