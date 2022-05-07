<?php


// ============================ Variables =============================

 $exchange = array();
// array index: array('Name of exchange','coin',best price sell,best price buy,amount sell,amount buy, Flag, Gap, fee withdraw);
// array_push($exchange, array("Exchange", "Coin", 0, 0, 0, 0, 0, 0, 0));

function Exnovin($coin)
{
    global $exchange;
    global $minimum_buy;
    $exchange_name = "Exnovin";
    $row = 30;

    switch($coin){
        case "USDT" : $api_url = "https://api.exnovin1.com/v1/orderbook?pair=USDT%2FTMN&limit=$row";
            break;
        case "XRP" : $api_url = "https://api.exnovin1.com/v1/orderbook?pair=XRP%2FTMN&limit=$row";
            break;
        case "DOT" : $api_url = "https://api.exnovin1.com/v1/orderbook?pair=DOT%2FTMN&limit=$row";
            break;
        case "DOGE" : $api_url = "https://api.exnovin1.com/v1/orderbook?pair=DOGE%2FTMN&limit=$row";
            break;
        case "XLM" : $api_url = "https://api.exnovin1.com/v1/orderbook?pair=XLM%2FTMN&limit=$row";
            break;
        case "EOS" : $api_url = "https://api.exnovin1.com/v1/orderbook?pair=EOS%2FTMN&limit=$row";
            break;
        case "TRX" : $api_url = "https://api.exnovin1.com/v1/orderbook?pair=TRX%2FTMN&limit=$row";
            break;
        case "ADA" : $api_url = "https://api.exnovin1.com/v1/orderbook?pair=ADA%2FTMN&limit=$row";
            break;
        case "BNB" : $api_url = "https://api.exnovin1.com/v1/orderbook?pair=BNB%2FTMN&limit=$row";
            break;
        case "MATIC" : $api_url = "https://api.exnovin1.com/v1/orderbook?pair=MATIC%2FTMN&limit=$row";
            break;
        case "DAI" : $api_url = "https://api.exnovin1.com/v1/orderbook?pair=DAI%2FTMN&limit=$row";
            break;
        case "LTC" : $api_url = "https://api.exnovin1.com/v1/orderbook?pair=LTC%2FTMN&limit=$row";
            break;

        default : $api_url = Telegram("Invalid Input!");;
    }

    $response_data = json_decode(file_get_contents($api_url));
    // echo "<br>Exnovin<br><pre>";
    // print_r($response_data);
    // echo "</pre>";

    $best_seller = MinimumBuyOrderObjectArray($response_data,"SELL")[0];
    $amount_best_seller = MinimumBuyOrderObjectArray($response_data,"SELL")[1];
    
    // echo "<br> MinimumBuyOrderObjectArray: ";
    // print_r (MinimumBuyOrderObjectArray($response_data,"SELL")[0]);

    $best_buyyer = MinimumBuyOrderObjectArray($response_data,"BUY")[0];
    $amount_best_buyyer = MinimumBuyOrderObjectArray($response_data,"BUY")[1];

    // echo "<br><br>Exnovin: Best seller: $best_seller , Amount: $amount_best_seller <br>Best buyyer: $best_buyyer , Amount: $amount_best_buyyer";

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