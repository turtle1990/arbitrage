<?php

function Ramzinex($coin)
{

    global $exchange;
    $exchange_name = "Ramzinex";
    $api_url = "https://publicapi.ramzinex.com/exchange/api/v1.0/exchange/orderbooks/";

    switch ($coin) {
        case "USDT":
            $api_url .= "11";
            break;
        case "XRP":
            $api_url .= "4";
            break;
        case "DOT":
            $api_url .= "29";
            break;
        case "DOGE":
            $api_url .= "10";
            break;
        case "XLM":
            $api_url .= "19";
            break;
        case "EOS":
            $api_url .= "76";
            break;
        case "TRX":
            $api_url .= "25";
            break;
        case "ADA":
            $api_url .= "33";
            break;
        case "BNB":
            $api_url .= "17";
            break;
        case "MATIC":
            $api_url .= "71";
            break;
        case "DAI":
            $api_url .= "239";
            break;
        case "LTC":
            $api_url .= "5";
            break;

        default:
            $api_url = Telegram("Ramzinex: Invalid Input!");
    }

    $sells = @file_get_contents($api_url . "/sells?readable=0");
    $buys = @file_get_contents($api_url . "/buys?readable=0");

    if($sells !== FALSE && $buys !== FALSE){


    $response_data_sells = json_decode($sells);
    $response_data_buys = json_decode($buys);
    // echo "<br>Ramzinex<br><pre>";
    // print_r($response_data_buys->data);
    // echo "</pre>";



        $response_data_sells->data = array_reverse($response_data_sells->data);
        $best_seller = MinimumBuyOrderArray($response_data_sells->data)[0];
        $amount_best_seller = MinimumBuyOrderArray($response_data_sells->data)[1];

        $best_buyyer = MinimumBuyOrderArray($response_data_buys->data)[0];
        $amount_best_buyyer = MinimumBuyOrderArray($response_data_buys->data)[1];


        // echo "<br>Ramzinex: Best seller: $best_seller , Amount: $amount_best_seller <br>Best buyyer: $best_buyyer , Amount: $amount_best_buyyer";


        $i = sizeof($exchange);
        $id = GetIndexExchangeByName($exchange_name);

        // echo "<br> GetIndexExchangeByName: " . GetIndexExchangeByName($exchange_name);

        if ($id == NULL || $id == "") {
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
        } else {
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