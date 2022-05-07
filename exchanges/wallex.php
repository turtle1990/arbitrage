<?php

function Wallex($coin){

    global $exchange;
    $exchange_name = "Wallex";

    switch($coin){
        case "USDT" : $api_url = "https://api.wallex.ir/v1/depth?symbol=USDTTMN";
            break;
        case "XRP" : $api_url = "https://api.wallex.ir/v1/depth?symbol=XRPTMN";
            break;
        case "DOT" : $api_url = "https://api.wallex.ir/v1/depth?symbol=DOTTMN";
            break;
        case "DOGE" : $api_url = "https://api.wallex.ir/v1/depth?symbol=DOGETMN";
            break;
        case "XLM" : $api_url = "https://api.wallex.ir/v1/depth?symbol=XLMTMN";
            break;
        case "EOS" : $api_url = "https://api.wallex.ir/v1/depth?symbol=EOSTMN";
            break;
        case "TRX" : $api_url = "https://api.wallex.ir/v1/depth?symbol=TRXTMN";
            break;
        case "ADA" : $api_url = "https://api.wallex.ir/v1/depth?symbol=ADATMN";
            break;
        case "BNB" : $api_url = "https://api.wallex.ir/v1/depth?symbol=BNBTMN";
            break;
        case "MATIC" : $api_url = "https://api.wallex.ir/v1/depth?symbol=MATICTMN";
            break;
        case "DAI" : $api_url = "https://api.wallex.ir/v1/depth?symbol=DAITMN";
            break;
        case "LTC" : $api_url = "https://api.wallex.ir/v1/depth?symbol=LTCTMN";
            break;

        default : $api_url = Telegram("Wallex: Invalid Input!");
    }

    $response_data = json_decode(file_get_contents($api_url));
    
    // echo "<br>$exchange_name<br><pre>";
    // print_r($response_data->result);
    // echo "</pre>";

    $best_seller = MinimumBuyOrderArrayWallexRIAL($response_data->result->ask)[0];
    $amount_best_seller = MinimumBuyOrderArrayWallexRIAL($response_data->result->ask)[1];

    $best_buyyer = MinimumBuyOrderArrayWallexRIAL($response_data->result->bid)[0];
    $amount_best_buyyer = MinimumBuyOrderArrayWallexRIAL($response_data->result->bid)[1];

    echo "<br>Wallex: Best seller: $best_seller , Amount: $amount_best_seller <br>Best buyyer: $best_buyyer , Amount: $amount_best_buyyer";

    $i = sizeof($exchange);
    $id = GetIndexExchangeByName($exchange_name);

    // echo "<br> GetIndexExchangeByName: " . GetIndexExchangeByName($exchange_name);

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

?>