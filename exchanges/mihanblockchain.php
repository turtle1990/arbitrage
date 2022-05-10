<?php

function Nobitex($coin){

    global $exchange;
    $exchange_name = "Mihanblockchain";

    $api_url = "https://mihanblockchain.com/wp-admin/admin-ajax.php?action=ajax_get_best_exchanges_orders&nonce=982cf09fbf&coin=";

    switch($coin){
        case "USDT" : $api_url .= "usdt";
            break;
        case "XRP" : $api_url .= "xrp";
            break;
        case "DOT" : $api_url .= "dot";
            break;
        case "DOGE" : $api_url .= "doge";
            break;
        case "XLM" : $api_url .= "xlm";
            break;
        case "EOS" : $api_url .= "eos";
            break;
        case "TRX" : $api_url .= "trx";
            break;
        case "ADA" : $api_url .= "ada";
            break;
        case "BNB" : $api_url .= "bnb";
            break;
        case "MATIC" : $api_url .= "matic";
            break;
        case "DAI" : $api_url .= "dai";
            break;
        case "LTC" : $api_url .= "ltc";
            break;

        default : $api_url = Telegram("Mihanblckchain: Invalid Input!");
    }

    $orders = @file_get_contents($api_url);

    if($orders !== FALSE){

        $response_data = json_decode($orders);
        
        echo "<br>Mihanblockchain<br><pre>";
        print_r($response_data);
        echo "</pre>";

}

?>