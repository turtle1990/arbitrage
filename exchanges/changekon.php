<?php

function Changekon($coin){
    global $exchange;
    $exchange_name = "Changekon";

    global $response_data_changekon;
    $response_data = NULL;

    switch($coin){
        case "ALLTYPE" : $response_data_changekon = json_decode(file_get_contents("https://changekon.com/api/v1/market/depth"));
            break;
        case "USDT" : $response_data = $response_data_changekon->USDT_TMN;
            break;
        case "XRP" : $response_data = $response_data_changekon->XRP_TMN;
            break;
        case "DOT" : $response_data = $response_data_changekon->DOT_TMN;
            break;
        case "DOGE" : $response_data = $response_data_changekon->DOGE_TMN;
            break;
        case "XLM" : $response_data = $response_data_changekon->XLM_TMN;
            break;
        case "EOS" : $response_data = $response_data_changekon->EOS_TMN;
            break;
        case "TRX" : $response_data = $response_data_changekon->TRX_TMN;
            break;
        case "ADA" : $response_data = $response_data_changekon->ADA_TMN;
            break;
        case "BNB" : $response_data = $response_data_changekon->BNB_TMN;
            break;
        case "MATIC" : $response_data = $response_data_changekon->MATIC_TMN;
            break;
        case "DAI" : $response_data = NULL;
            break;
        case "LTC" : $response_data = $response_data_changekon->LTC_TMN;
            break;
        default : $response_data = Telegram("Invalid Input!");
    }

    if($response_data != NULL){
        
        $asks = $response_data->asks;
        $best_seller = MinimumBuyOrderObject($asks)[0];
        $amount_best_seller = MinimumBuyOrderObject($asks)[1];
        
        $bids = $response_data->bids;
        $best_buyyer = MinimumBuyOrderObject($bids)[0];
        $amount_best_buyyer = MinimumBuyOrderObject($bids)[1];
        
        // echo "Best seller: $best_seller , Amount: $amount_best_seller <br>Best buyyer: $best_buyyer , Amount: $amount_best_buyyer";

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

}

?>