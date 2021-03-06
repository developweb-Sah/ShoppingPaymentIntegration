<?php
require 'config.php';
if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $sql="SELECT * FROM `product` WHERE id='$id'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    
    $pname=$row['product_name']; 
    $pprice=$row['product_price'];
    $del_charge=50;
    $total_price=$pprice+$del_charge;
    $image=$row['product_image'];
}
else{
    echo 'No Product Found!';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete your order</title>
    
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
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        <a class="nav-link" href="#">Product</a>
        <a class="nav-link" href="#">Pricing</a>
      </div>
    </div>
  </div>
</nav>


<div class="container">
     <div class="row justify-content-center">
       <div class="col-md-10 mb-5">
           <h2 class="text-center p-2 text-primary">Fill the Details to complete your order</h2>
           <h3>Product Details : </h3>
           <table class="table table-bordered" width="500px">
              <tr>
                  <th>Product Name : </th>
                  <td><?= $pname; ?></td>
                  <!-- Image Display -->
                  <!-- <td rowspan="4" class="text-center"><img src="<?= $pimage; ?> " width="200"></td> -->
              </tr>
              <tr>
                  <th>Product Price :</th>
                  <td>Rs. <?= number_format($pprice); ?>/-</td>
              </tr>
              <tr>
              <th>Delivery Charge :</th>
              <td>Rs. <?= number_format($del_charge);  ?></td>
              </tr>
              <tr>
              <td>Total Price : </td>
              <td>Rs. <?= number_format($total_price);  ?></td>
              </tr>
           </table>
           <h4>Enter your Details :</h4>
           <form action="pay.php" method="post" accept-charset="utf-8">
               <input type="hidden" name="product_name" value="<?= $pname; ?>">
               <input type="hidden" name="product_price" value="<?= $total_price; ?>">
               <div class="form-group">
                   <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
               </div>
               <div class="form-group">
                   <input type="email" name="email" class="form-control" placeholder="Enter your Email" required>
               </div>
               <div class="form-group">
                   <input type="tel" name="phone" class="form-control" placeholder="Enter your Phone number" required>
               </div>
               <div class="form-group">
                   <input type="submit" name="submit" class="btn btn-danger btn-lg" value="Click to pay : Rs. <?= number_format($total_price) ;?>/-"> 
               </div>
               </form>
       </div>
     </div>
</div>
</body>
</html>