<?php
$grand_total = $_SESSION["grand_total"];
$ship_address = $_POST['ship_address'];
$transaction_code = $_SESSION["transaction_code"];

//Database Info
require_once 'app/controllers/connect.php';
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "coffeeculture";

// $host = "db4free.net";
// $db_username = "aarongalia";
// $db_password = "coffeevulture";
// $db_name = 'coffeeculture';

//Create connection to database
// $conn = mysqli_connect($servername, $username, $password, $dbname);
// $conn = mysqli_connect($host, $db_username, $db_password, $db_name);

//Check connection
// if (!$conn) {
// 	die("Connection failed: "  . mysqli_connect_error());
// } 

require "vendor/autoload.php";
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;


$apiContext = new \PayPal\Rest\ApiContext(
	new \PayPal\Auth\OAuthTokenCredential(
		'ASkxQ29AAwHW-UGRBSERUAieCbZS-iroT29zIU0dpzaYk6fM-rkQyMvehnnnDIR480dOr3FWPpHJGV15',
		'ELpierPGOr13NZ7_skj13NAPw8jqcsdg-33mitgYA4XYa_UaNJLUoV9cvTwgjl4IbfykMsgEikEsXs05'
	)
);

$payer = new Payer();
$payer->setPaymentMethod('paypal');


//Create array to contain indiviadual items
$items = []; //on loop: $items += [];

//Create every individual item
$indiv_item = new Item();
$indiv_item ->setName("Laptop")
			->setCurrency("PHP")
			->setQuantity(1)
			->setPrice(15000); //per item

//Add indiv_item to $items[] array
$items[] = $indiv_item;

//Create item list
$item_list  = new ItemList();
$item_list  ->setItems($items);

//Create amount
$amount = new Amount();
$amount ->setCurrency("PHP")
		->setTotal($grand_total); //grand total

//Create transaction
$transaction = new Transaction();
$transaction ->setAmount($amount)
			 ->setItemList($itemlist)
			 ->setDescription("$transaction_code")
			 ->setInvoiceNumber(uniqid("coffeeculture-"));

//where to go after\
$redirectUrls = new RedirectUrls();
$redirectUrls
	//Create successful file
	->setReturnUrl('https://desolate-plateau-78914.herokuapp.com/app/controllers/ppmailer.php')
	//Create unsuccessful file
	->setCancelUrl('https://desolate-plateau-78914.herokuapp.com/app/views/checkout.php');
	//Create successful file
	// ->setReturnUrl('https://localhost/csp2-ecommerce/appp/app/controllers/ppmailer.php')
	// //Create unsuccessful file
	// ->setCancelUrl('https://localhost/csp2-ecommerce/appp//app/views/checkout.php');

$payment = new Payment();
$payment ->setIntent("sale")
		 ->setPayer($payer)
		 ->setRedirectUrls($redirectUrls)
		 ->setTransactions([$transaction]);

try{
	$payment->create($apiContext);
}catch(Exception $e){
	die($e->getData());
}

$approvalUrl = $payment->getApprovalLink();
header('location: '.$approvalUrl);

?>