<?php
include('common/nav.php');
?>
<!-- Main Content Start -->
<div class="main_content">
  <?php
  include('common/usernavbar.php');
  ?>
  <div class="orders_purchase_table table-responsive">
    <p class="table_title">Purchased Products</p>
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
        <?php foreach ($purchase as $purchaseproduct) : ?>
          <tr>
            <td><?php echo $purchaseproduct["sku"] ?></td>
            <td><?php echo $purchaseproduct["name"] ?></td>
            <td><?php echo $purchaseproduct["stock"] ?></td>
            <td><?php echo $purchaseproduct["price"] ?></td>
          </tr>
        <?php endforeach; ?>

      </tbody>
    </table>
  </div>
  <div class="orders_sales_table table-responsive">
    <p class="table_title">Sales Products</p>
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
        <?php foreach ($sales as $salesproduct) : ?>
          <tr>
            <td><?php echo $salesproduct["sku"] ?></td>
            <td><?php echo $salesproduct["name"] ?></td>
            <td><?php echo $salesproduct["stock"] ?></td>
            <td><?php echo $salesproduct["price"] ?></td>
          </tr>
        <?php endforeach; ?>

      </tbody>
    </table>
  </div>
</div>
<!-- Main Content End -->
<?php
include('common/footer.php');
?>