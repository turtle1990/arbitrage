<?php 

function Dollarkadeh($coin){

    global $exchange;
    $exchange_name = "Dollarkadeh";

    
    switch($coin){
        case "USDT" : $api_id = "12";
            break;
        case "XRP" : $api_id = "36";
            break;
        case "DOT" : $api_id = "37";
            break;
        case "DOGE" : $api_id = "14";
            break;
        case "XLM" : $api_id = "44";
            break;
        case "EOS" : $api_id = "49";
            break;
        case "TRX" : $api_id = "10";
            break;
        case "ADA" : $api_id = "23";
            break;
        case "BNB" : $api_id = "16";
            break;
        case "MATIC" : $api_id = "41";
            break;
        case "DAI" : $api_id = "47";
            break;
        case "LTC" : $api_id = "2";
            break;

        default : $api_url = Telegram("Nobitex: Invalid Input!");
    }


    $api_url_price_sell = "https://dollarkadeh.org/ajax/exchange/update-rate?c1=1&c2=$api_id";
    $api_url_amount_sell = "https://dollarkadeh.org/ajax/exchange/balance?currency_id=$api_id";

    $api_url_price_buy = "https://dollarkadeh.org/ajax/exchange/update-rate?c1=$api_id&c2=1";
    $api_url_amount_buy = 0;


    $best_seller = intval(Str_after(file_get_contents($api_url_price_sell), '|')) * 10; 
    $amount_best_seller = file_get_contents($api_url_amount_sell);


    $best_buyyer = intval(Str_after(file_get_contents($api_url_price_buy), '|')) * 10; 
    $amount_best_buyyer = $api_url_amount_buy;

    // echo "<br>Dollarkadeh: Best seller: $best_seller , Amount: $amount_best_seller <br>Best buyyer: $best_buyyer , Amount: $amount_best_buyyer";

    
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