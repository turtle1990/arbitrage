<?php

function Rabincash($coin){

    global $exchange;
    $exchange_name = "Rabincash";

    switch($coin){
        case "USDT" : $api_url = "https://edge.rabincash.com/api/v2/get_orderbook?market=usdt_irt&level=0";
            break;
        case "XRP" : $api_url = "https://edge.rabincash.com/api/v2/get_orderbook?market=xrp_irt&level=0";
            break;
        case "DOT" : $api_url = "https://edge.rabincash.com/api/v2/get_orderbook?market=dot_irt&level=0";
            break;
        case "DOGE" : $api_url = "https://edge.rabincash.com/api/v2/get_orderbook?market=doge_irt&level=0";
            break;
        case "XLM" : $api_url = "https://edge.rabincash.com/api/v2/get_orderbook?market=xlm_irt&level=0";
            break;
        case "EOS" : $api_url = NULL;
            break;
        case "TRX" : $api_url = "https://edge.rabincash.com/api/v2/get_orderbook?market=trx_irt&level=0";
            break;
        case "ADA" : $api_url = "https://edge.rabincash.com/api/v2/get_orderbook?market=ada_irt&level=0";
            break;
        case "BNB" : $api_url = "https://edge.rabincash.com/api/v2/get_orderbook?market=bnb_irt&level=0";
            break;
        case "MATIC" : $api_url = "https://edge.rabincash.com/api/v2/get_orderbook?market=matic_irt&level=0";
            break;
        case "DAI" : $api_url = "https://edge.rabincash.com/api/v2/get_orderbook?market=dai_irt&level=0";
            break;
        case "LTC" : $api_url = "https://edge.rabincash.com/api/v2/get_orderbook?market=ltc_irt&level=0";
            break;

        default : $api_url = Telegram("Nobitex: Invalid Input!");
    }

    if ($api_url != NULL ){

    $response_data = json_decode(file_get_contents($api_url));
    
    // echo "<br>$exchange_name<br><pre>";
    // print_r($response_data->data);
    // echo "</pre>";

    $best_seller = MinimumBuyOrderArrayRabinRIAL($response_data->data->sell)[0];
    $amount_best_seller = MinimumBuyOrderArrayRabinRIAL($response_data->data->sell)[1];

    $best_buyyer = MinimumBuyOrderArrayRabinRIAL($response_data->data->buy)[0];
    $amount_best_buyyer = MinimumBuyOrderArrayRabinRIAL($response_data->data->buy)[1];

    // echo "<br>$exchange_name: Best seller: $best_seller , Amount: $amount_best_seller <br>Best buyyer: $best_buyyer , Amount: $amount_best_buyyer";


    $i = sizeof($exchange);
    $id = GetIndexExchangeByName($exchange_name);

    echo "<br> GetIndexExchangeByName: " . GetIndexExchangeByName($exchange_name);

    if ($id == NULL){
        // echo "Not find!";
        $exchange[$i][0] = $exchange_name;
        $exchange[$i][1] = $coin;
        $exchange[$i][2] = intval($best_seller) * 10;
        $exchange[$i][3] = intval($best_buyyer) * 10;
        $exchange[$i][4] = floatval($amount_best_seller);
        $exchange[$i][5] = floatval($amount_best_buyyer);
        $exchange[$i][6] = 0; //Flag
        $exchange[$i][7] = 0; //Gap
        $exchange[$i][8] = Fee_table($coin);
    }else{
        // echo "find!";
        $exchange[$id][0] = $exchange_name;
        $exchange[$id][1] = $coin;
        $exchange[$id][2] = intval($best_seller) * 10;
        $exchange[$id][3] = intval($best_buyyer) * 10;
        $exchange[$id][4] = floatval($amount_best_seller);
        $exchange[$id][5] = floatval($amount_best_buyyer);
        $exchange[$id][6] = 0; //Flag
        $exchange[$id][7] = 0; //Gap
        $exchange[$id][8] = Fee_table($coin);
    }
    }

}

?>