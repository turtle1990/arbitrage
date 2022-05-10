<?php

function Bitbarg($coin){

    global $exchange;
    $exchange_name = "Bitbarg";

    $api_url = "https://api.bitbarg.me/api/v1/currencies";

    switch($coin){
        case "USDT" : $api_url = "https://api.bitbarg.me/api/v1/currencies";
            break;
        case "XRP" : $api_url = NULL;
            break;
        case "DOT" : $api_url = NULL;
            break;
        case "DOGE" : $api_url = NULL;
            break;
        case "XLM" : $api_url = NULL;
            break;
        case "EOS" : $api_url = NULL;
            break;
        case "TRX" : $api_url = NULL;
            break;
        case "ADA" : $api_url = NULL;
            break;
        case "BNB" : $api_url = NULL;
            break;
        case "MATIC" : $api_url = NULL;
            break;
        case "DAI" : $api_url = NULL;
            break;
        case "LTC" : $api_url = NULL;
            break;

        default : $api_url = Telegram("Bitbarg: Invalid Input!");
    }

    if($coin == "USDT"){

        $response_data = json_decode(file_get_contents($api_url));
        
        // echo "<br>$exchange_name<br><pre>";
        // print_r($response_data->result->meta->prices);
        // echo "</pre>";

        $best_seller = intval($response_data->result->meta->prices->buy) * 10;
        $amount_best_seller = 0;

        $best_buyyer = intval($response_data->result->meta->prices->sell) * 10;
        $amount_best_buyyer = 0;

        // echo "<br>Bitbarg: Best seller: $best_seller , Amount: $amount_best_seller <br>Best buyyer: $best_buyyer , Amount: $amount_best_buyyer";


        $i = sizeof($exchange);
        $id = GetIndexExchangeByName($exchange_name);

        echo "<br> GetIndexExchangeByName: " . GetIndexExchangeByName($exchange_name);

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