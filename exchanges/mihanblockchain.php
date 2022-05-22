<?php

function Mihanblockchain($coin){

    $html_site = file_get_html("https://mihanblockchain.com/exchange-prices");
    $js_finder = substr($html_site, strpos($html_site, 'https://mihanblockchain.com/wp-content/cache/min/1/')+51, 32);

    $js = file_get_html("https://mihanblockchain.com/wp-content/cache/min/1/$js_finder.js");
    $activator = substr($js, strpos($js, '"Nonce":"')+9, 10);


    global $exchange;
    global $exchange_finance;
    $exchange_name = "Mihanblockchain";
    
    $api_url = "https://mihanblockchain.com/wp-admin/admin-ajax.php?action=ajax_get_best_exchanges_orders&nonce=". $activator ."&coin=";


    switch($coin){
        case "USDT" : $api_url .= "usdt";
            break;
        case "XRP" : $api_url .= "xrp";
            break;
        case "DOT" : $api_url .= "dot";
            break;
        case "DOGE" : $api_url .= "doge";
            break;
        case "XLM" : $api_url .= "xlm";
            break;
        case "EOS" : $api_url .= "eos";
            break;
        case "TRX" : $api_url .= "trx";
            break;
        case "ADA" : $api_url .= "ada";
            break;
        case "BNB" : $api_url .= "bnb";
            break;
        case "MATIC" : $api_url .= "matic";
            break;
        case "DAI" : $api_url .= "dai";
            break;
        case "LTC" : $api_url .= "ltc";
            break;

        default : $api_url = Telegram("Mihanblckchain: Invalid Input!");
    }

    // print $api_url;

    $orders = file_get_contents($api_url);

    // print_r ($orders);

    if($orders !== FALSE){

        $response_data = json_decode($orders);
        
        echo "<br>Mihanblockchain<br><pre>";
        print_r($response_data->Exchanges);
        echo "</pre>";

        foreach($response_data->Exchanges as $exchange_name){
            echo " ";
            $index = searchByExchangeName($exchange_name->id, $exchange_finance);
            $i = sizeof($exchange);

            if ($index == "Not find"){
                echo "<br> Not Find: " . $exchange_name->id;
                $exchange[$i][0] = $exchange_name->id;
                $exchange[$i][1] = $coin;
                $exchange[$i][2] = intval($exchange_name->best_asks_price * 10);
                $exchange[$i][3] = intval($exchange_name->best_bids_price * 10);
                $exchange[$i][4] = 0;
                $exchange[$i][5] = 0;
                $exchange[$i][6] = 0; //Flag
                $exchange[$i][7] = 0; //Gap
                $exchange[$i][8] = Fee_table($coin);

            }else{

                echo "<br> FIND: " . $exchange_finance[$index]['ID'] . " Name: " . $exchange_finance[$index]['EXCHANGE_NAME'];

            }
        }
    }

}

?>