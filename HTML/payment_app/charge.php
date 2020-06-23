<?php
require_once('vendor/autoload.php');
require_once('config/db.php');
require_once('lib/pdo_db.php');
require_once('models/customer.php');
require_once('models/transactions.php');

\Stripe\Stripe::setApiKey('sk_test_MrKM1nvaRe9Yw4g32aZQuWOu');

//Sanitize POST Array
$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

$first_name = $POST['first_name'];
$last_name = $POST['last_name'];
$email = $POST['email'];
$token = $POST['stripeToken'];

//Create Customer in stripe

$customer = \Stripe\Customer::create(array(
    "email" => $email,
    "source" => $token
));

//Charge customer

$charge = \Stripe\Charge::create(array(
    "amount" => 2000,
    "currency" => "zar",
    "description" => "Uber ride payment",
    "customer" => $customer->id
));

//Customer Data
$customerData = [
    'id' => $charge->customer,
    'first_name' => $first_name,
    'last_name' => $last_name,
    'email' => $email
];

//Instantiate Customer
$customer = new Customer();

//Add customer to DB
$customer->addCustomer($customerData);


//Transaction Data
$transactionData = [
    'u_id' => $charge->id,
    'customer_id' => $charge->customer,
    'product' => $charge->description,
    'amount' => $charge->amount,
    'currency' => $charge->currency,
    'status' => $charge->status
];

//Instantiate Transaction
$transaction = new Transaction();

//Add transaction to DB
$transaction->addTransaction($transactionData);




    //Redirect to main
    header('Location: success.php?tid='.$charge->id.'&product='.$charge->description);







?>
