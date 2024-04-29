<main class="dashboard_main">
  <script type="text/javascript">
    window.onload = function() {
      var chart = new CanvasJS.Chart("chartContainer", {
        height: 400,
        title: {
          text: "Monthly status - Stock / Purchase / Sales",
          fontSize: 20
        },
        data: [{
          type: "doughnut",
          dataPoints: [{
              y: <?= $totalstock ?>,
              indexLabel: "stock"
            },
            {
              y: <?= $totalsales ?>,
              indexLabel: "Sales"
            },
            {
              y: <?= $totalpurchase ?>,
              indexLabel: "Purchases"
            },
          ]
        }]
      });

      chart.render();
    }
  </script>
  <script type="text/javascript" src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
  <div class="status_main">
    <div class="status_card_1">
      <p>Total Products :</p>
      <p class="status_card_value">10</p>
    </div>
    <div class="status_card_2">
      <p>Total Stock :</p>
      <p class="status_card_value">300</p>
    </div>
    <div class="status_card_3">
      <p>Total Orders :</p>
      <p class="status_card_value">190</p>
    </div>
    <div class="status_card_4">
      <p>Stock Require :</p>
      <p class="status_card_value">4</p>
    </div>
  </div>

  <div id="chartContainer"></div>
  <div class="dashboard_table_container">
    <p style="color: red; margin: 0.5rem 0">Attention: Stock Required**</p>
    <table class="table table-striped table-danger">
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
          <?php if ($product['stock'] < 50) : ?>
            <tr>
              <td><?php echo $product["sku"] ?></td>
              <td><?php echo $product["name"] ?></td>
              <td><?php echo $product["stock"] ?></td>
              <td><?php echo $product["price"] ?></td>
            </tr>
          <?php endif ?>
        <?php endforeach; ?>

      </tbody>
    </table>
  </div>
</main>