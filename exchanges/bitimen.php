<?php

function Bitimen($coin){

    global $exchange;
    $exchange_name = "Bitimen";

    switch($coin){
        case "USDT" : $api_url = "https://api.bitimen.com/api/orderbook/depth/USDT_IRT";
            break;
        case "XRP" : $api_url = "https://api.bitimen.com/api/orderbook/depth/XRP_IRT";
            break;
        case "DOT" : $api_url = "https://api.bitimen.com/api/orderbook/depth/DOT_IRT";
            break;
        case "DOGE" : $api_url = "https://api.bitimen.com/api/orderbook/depth/DOGE_IRT";
            break;
        case "XLM" : $api_url = "https://api.bitimen.com/api/orderbook/depth/XLM_IRT";
            break;
        case "EOS" : $api_url = "https://api.bitimen.com/api/orderbook/depth/EOS_IRT";
            break;
        case "TRX" : $api_url = "https://api.bitimen.com/api/orderbook/depth/TRX_IRT";
            break;
        case "ADA" : $api_url = "https://api.bitimen.com/api/orderbook/depth/ADA_IRT";
            break;
        case "BNB" : $api_url = "https://api.bitimen.com/api/orderbook/depth/BNB_IRT";
            break;
        case "MATIC" : $api_url = "https://api.bitimen.com/api/orderbook/depth/MATIC_IRT";
            break;
        case "DAI" : $api_url = "https://api.bitimen.com/api/orderbook/depth/DAI_IRT";
            break;
        case "LTC" : $api_url = "https://api.bitimen.com/api/orderbook/depth/LTC_IRT";
            break;

        default : $api_url = Telegram("Bitimen: Invalid Input!");
    }

    $response_data = json_decode(file_get_contents($api_url));

    // echo "<pre>";
    // print_r($response_data);
    // echo "</pre>";

    $best_seller = MinimumBuyOrderArrayRIAL($response_data->asks)[0];
    $amount_best_seller = MinimumBuyOrderArrayRIAL($response_data->asks)[1];

    $best_buyyer = MinimumBuyOrderArrayRIAL($response_data->bids)[0];
    $amount_best_buyyer = MinimumBuyOrderArrayRIAL($response_data->bids)[1];

    // echo "<br>Bitimen: Best seller: $best_seller , Amount: $amount_best_seller <br>Best buyyer: $best_buyyer , Amount: $amount_best_buyyer";

    // echo "<br> Number of Global Exchange: " . sizeof($exchange);
    $i = sizeof($exchange);
    $id = GetIndexExchangeByName($exchange_name);

    // echo "<br> GetIndexExchangeByName: " . GetIndexExchangeByName($exchange_name);

    if ($id == NULL){
        // echo "Not find!";
        $exchange[$i][0] = $exchange_name;
        $exchange[$i][1] = $coin;
        $exchange[$i][2] = intval($best_seller * 10);
        $exchange[$i][3] = intval($best_buyyer * 10);
        $exchange[$i][4] = floatval($amount_best_seller);
        $exchange[$i][5] = floatval($amount_best_buyyer);
        $exchange[$i][6] = 0; //Flag
        $exchange[$i][7] = 0; //Gap
        $exchange[$i][8] = Fee_table($coin);
    }else{
        // echo "find!";
        $exchange[$id][0] = $exchange_name;
        $exchange[$id][1] = $coin;
        $exchange[$id][2] = intval($best_seller * 10);
        $exchange[$id][3] = intval($best_buyyer * 10);
        $exchange[$id][4] = floatval($amount_best_seller);
        $exchange[$id][5] = floatval($amount_best_buyyer);
        $exchange[$id][6] = 0; //Flag
        $exchange[$id][7] = 0; //Gap
        $exchange[$id][8] = Fee_table($coin);
    }
}

?>