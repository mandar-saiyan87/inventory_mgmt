<?php
include('common/nav.php');
?>
<!-- Main Content Start -->
<div class="main_content">
  <?php
  include('common/usernavbar.php');
  ?>
  <div>
    <?php foreach ($unique_category as $cat) : ?>
      <div class="category_table table-responsive">
        <p class="table_title ">Product Category: <?= $cat ?></p>
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">SKU</th>
              <th scope="col">Product Name</th>
              <th scope="col">Current Stock</th>
              <th scope="col">Price</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($products as $product) : ?>
              <?php if ($product['category'] === $cat) : ?>
                <tr>
                  <td><?php echo $product["sku"] ?></td>
                  <td><?php echo $product["name"] ?></td>
                  <td><?php echo $product["stock"] ?></td>
                  <td><?php echo $product["price"] ?></td>
                </tr>
              <?php endif ?>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>

    <?php endforeach; ?>
  </div>
</div>
<!-- Main Content End -->
<?php
include('common/footer.php');
?>