<?php

function Nobitex($coin){

    global $exchange;
    $exchange_name = "Bitbarg";

    switch($coin){
        case "USDT" : $api_url = "https://api.nobitex.ir/v2/orderbook/USDTIRT";
            break;

        default : $api_url = Telegram("Nobitex: Invalid Input!");
    }

    $response_data = json_decode(file_get_contents($api_url));
    
    // echo "<br>Nobitex<br><pre>";
    // print_r($response_data);
    // echo "</pre>";

    $best_seller = MinimumBuyOrderArray($response_data->bids)[0];
    $amount_best_seller = MinimumBuyOrderArray($response_data->bids)[1];

    $best_buyyer = MinimumBuyOrderArray($response_data->asks)[0];
    $amount_best_buyyer = MinimumBuyOrderArray($response_data->asks)[1];

    // echo "<br>Nobitex: Best seller: $best_seller , Amount: $amount_best_seller <br>Best buyyer: $best_buyyer , Amount: $amount_best_buyyer";


    $i = sizeof($exchange);
    $id = GetIndexExchangeByName($exchange_name);

    // echo "<br> GetIndexExchangeByName: " . GetIndexExchangeByName($exchange_name);

    if ($id == NULL){
        // echo "Not find!";
        $exchange[$i][0] = $exchange_name;
        $exchange[$i][1] = $coin;
        $exchange[$i][2] = intval($best_seller);
        $exchange[$i][3] = intval($best_buyyer);
        $exchange[$i][4] = floatval($amount_best_seller);
        $exchange[$i][5] = floatval($amount_best_buyyer);
        $exchange[$i][6] = 0; //Flag
        $exchange[$i][7] = 0; //Gap
        $exchange[$i][8] = Fee_table($coin);
    }else{
        // echo "find!";
        $exchange[$id][0] = $exchange_name;
        $exchange[$id][1] = $coin;
        $exchange[$id][2] = intval($best_seller);
        $exchange[$id][3] = intval($best_buyyer);
        $exchange[$id][4] = floatval($amount_best_seller);
        $exchange[$id][5] = floatval($amount_best_buyyer);
        $exchange[$id][6] = 0; //Flag
        $exchange[$id][7] = 0; //Gap
        $exchange[$id][8] = Fee_table($coin);
    }


}

?>