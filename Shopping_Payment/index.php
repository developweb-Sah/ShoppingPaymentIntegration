<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<!-- Nav Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Matlab Code</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ml-auto">
        <a class="nav-link active" aria-current="page" href="#">Home</a>
        <a class="nav-link" href="#">Product</a>
        <a class="nav-link" href="add.php">Sell Product</a>
      </div>
    </div>
  </div>
</nav>

<?php
   require 'config.php';
   $sql="SELECT * FROM `product`";
   $result=mysqli_query($conn, $sql);
?>
<div class="container">
    <div class="row">
    <?php
       while($row=mysqli_fetch_array($result)){
    ?>
    <div class="col-lg-4 mt-3 mb-3">
    <div class="card-deck">
        <div class="card border-info p-2">
            <img src="<?= $row['product_image'];?>" class="card-img-top" height="200">
            <h5 class="card-title">Product :<?=$row['product_name']; ?></h5>
            <h3>Price : <?= number_format($row['product_price']); ?>/-</h3>
            <a href="order.php?id=<?=$row['id']; ?>" class="btn btn-danger btn-block btn-lg">Buy Now</a>
        </div>
    </div>
    </div>
    <?php } ?>
    </div>
</div>
</body>
</html>