<?php
require ('./instamojo/Instamojo.php');
$product_name=$_POST['product_name'];
$price=$_POST['product_price'];
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
// $API_KEY ="test_edfed1c6e1a417eb18cc4c685b7";
// $AUTH_TOKEN = "test_0e8652ebdc6abd6d3dae4ca7be9";
// $url='https://test.instamojo.com/api/1.1/';
// include 'instamojo/Instamojo.php';


// if(isset($_POST['purpose'])&& isset($_POST['amount']) && isset($_POST['buyer_name']) && isset($_POST['eamil']) && isset($_POST['phone'])){

    $api= new Instamojo\Instamojo('test_edfed1c6e1a417eb18cc4c685b7', 'test_0e8652ebdc6abd6d3dae4ca7be9', 'https://test.instamojo.com/api/1.1/');

try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => $product_name,
        "amount" => $price,
        "send_email" => true,
        "email" => $email,
        "buyer_name"=>$name,
        "phone"=>$phone,
        "send_sms"=>true,
        "allow_repeated_payments"=> false,
        "redirect_url" => "http://Localhost/Shopping_Payment/thankyou.php",
        "webhook"=>"https://test.instamojo.com/@saheenjash2126/"
));
$pay_url=$response['longurl'];
header("Location: $pay_url");
// exit();
}
catch (Exception $e) {
print('Error: ' . $e->getMessage());
}

?>