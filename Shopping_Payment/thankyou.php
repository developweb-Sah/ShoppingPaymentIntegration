<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thankyou for Purchasing!</title>
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


  <div class="container">
  <div class="row justify-content-centrer">
  <div class="col-md-8">
  <h1 class="text-center">Thankyou For Purchasing!</h1>
  <?php
     include 'instamojo/Instamojo.php';
      $api=new Instamojo\Instamojo('test_edfed1c6e1a417eb18cc4c685b7', 'test_0e8652ebdc6abd6d3dae4ca7be9', 'https://test.instamojo.com/api/1.1/');

      $payid=$_GET['payment_request_id'];

      try{
          $response=$api->paymentRequestStatus($payid);
          ?>
          <h2>Payment Details : </h2>
          <table class="table table-bordered">
              <tr>
                  <th>You have Purchased : </th>
                  <td><?= $response['purpose']; ?></td>
              </tr>
              <tr>
                  <th>Payment ID :</th>
                  <td><?= $response['payments'][0]['payment_id']; ?></td>
              </tr>
              <tr>
                  <th>Payee Name:</th>
                  <td><?=  $response['payments'][0]['buyer_name'];   ?></td>
              </tr>
              <tr>
                  <th>Payee Email:</th>
                  <td><?=  $response['payments'][0]['buyer_email'];   ?></td>
              </tr>
          </table>
          <?php
      }
      catch(Exception $e){
          print("Error : ".$e->getMessage());
      }
  ?>
  </div>
  </div></div> 
</body>
</html>