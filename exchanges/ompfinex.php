<?php

function Ompfinex($coin){

    global $exchange;
    $exchange_name = "Ompfinex";

    switch($coin){
        case "USDT" : $api_url = "https://api.ompfinex.com/v1/market/9/order";
            break;
        case "XRP" : $api_url = "https://api.ompfinex.com/v1/market/4/order";
            break;
        case "DOT" : $api_url = "https://api.ompfinex.com/v1/market/62/order";
            break;
        case "DOGE" : $api_url = "https://api.ompfinex.com/v1/market/5/order";
            break;
        case "XLM" : $api_url = "https://api.ompfinex.com/v1/market/11/order";
            break;
        case "EOS" : $api_url = "https://api.ompfinex.com/v1/market/12/order";
            break;
        case "TRX" : $api_url = "https://api.ompfinex.com/v1/market/8/order";
            break;
        case "ADA" : $api_url = "https://api.ompfinex.com/v1/market/10/order";
            break;
        case "BNB" : $api_url = "https://api.ompfinex.com/v1/market/6/order";
            break;
        case "MATIC" : $api_url = "https://api.ompfinex.com/v1/market/54/order";
            break;
        case "DAI" : $api_url = NULL;
            break;
        case "LTC" : $api_url = "https://api.ompfinex.com/v1/market/3/order";
            break;

        default : $api_url = Telegram("Ompfinex: Invalid Input!");
    }

    $orders = @file_get_contents($api_url);

    if($orders !== FALSE && $api_url != NULL){

    $response_data = json_decode($orders);

        usort($response_data->data, 'ComparatorType');
        usort($response_data->data, 'ComparatorPrice');

        // print("\nSorted object array:\n");
        // echo "<pre>";
        // print_r($response_data->data);
        // echo "</pre>";

        $best_seller = MinimumBuyOrderObjectType($response_data->data,"sell")[0];
        $amount_best_seller = MinimumBuyOrderObjectType($response_data->data,"sell")[1];

        usort($response_data->data, 'ComparatorPriceReverse');

        $best_buyyer = MinimumBuyOrderObjectType($response_data->data,"buy")[0];
        $amount_best_buyyer = MinimumBuyOrderObjectType($response_data->data,"buy")[1];
        
        // echo "<br>Ompfinex: Best seller: $best_seller , Amount: $amount_best_seller <br>Best buyyer: $best_buyyer , Amount: $amount_best_buyyer";


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

}
?>