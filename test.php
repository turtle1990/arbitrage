<?php ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);ini_set('max_execution_time', 300); ?>

<?php
$api_url = "https://changekon.com/sell_orders?market=USDT_TMN";

$response_data = json_decode(file_get_contents($api_url));
// $response_data = file_get_contents($api_url);
echo "<pre>";
var_dump ($response_data);
echo "</pre>";

if ($response_data){
    echo "Find It";
}


// print_r  (strcasecmp('ramzinex' , "Ramzinex"));

?>