<?php

require_once ("db_conn.php");
require_once('exclude.php');

//---------------- Origins to Destinations exchange --------------------

function Arbitrge($want_arbitrage_percent)
{
    global $amount_buy;
    global $minimum_buy;
    global $exchange;
    global $exchange_finance;
    $exchange_origin_result= NULL;
    $exchange_destination_result= NULL;
    $origins = $destinations = "";

    // echo "<pre>";
    // var_dump($exchange);
    // echo "</pre>";

    // Dollarkadeh coin DAI is Disable.
    $exchange = Exclude($exchange,"Dollarkadeh","DAI");
    // Exir coin Matic network ERC.
    $exchange = Exclude($exchange,"Exir","MATIC");
    // Exir: coin Dot withdraw and deposit not available.
    $exchange = Exclude($exchange,"Exir","DOT");
    // Changekon: coin DAI Dosn't exist;
    $exchange = Exclude($exchange,"Changekon","DAI");
    // Ompfinex: coin DAI Dosn't exist;
    $exchange = Exclude($exchange,"Ompfinex","DAI");
    // Wallex: coin DAI Dosn't exist;
    $exchange = Exclude($exchange,"Wallex","DAI");
    // Lopiro: coin USDT is ERC-20;
    $exchange = Exclude($exchange,"Lopiro","USDT");
    // Salamcrypto: coin DAI last update for a long time ago
    $exchange = Exclude($exchange,"Salamcrypto","DAI");
    // Exchaino: coin EOS last update for a long time ago
    $exchange = Exclude($exchange,"Exchaino","EOS");
    // Coinkade: coin DAI is deactive.
    $exchange = Exclude($exchange,"Coinkade","DAI");
    // Abantether: Not good exchange, approximate price.
    $exchange = Exclude($exchange,"Abantether","ALLTYPE");

    //detect gap
    $exchange = Gap($exchange,$want_arbitrage_percent);

    //  echo "<pre>";
    //  var_dump($exchange);
    //  echo "</pre>";

     // Find min and max price
    $max_price[0][3] = $min_price[0][2] = 0;

    for($i = 0; $i < sizeof($exchange); $i++){    
        //Min Price
        if(($exchange[$i][2] < $min_price[0][2] || $min_price[0][2] == 0) /* && $exchange[$i][7] == 0 */  && $exchange[$i][2]!=0 && $exchange[$i][6] == 0 && ($exchange[$i][5] == 0  || ($exchange[$i][5]*$exchange[$i][2] > $minimum_buy))){

            for($j = 0; $j < sizeof($exchange[0]); $j++){
                $min_price[0][$j] = $exchange[$i][$j];
                // echo "<br> <b class=green>Min Run it</b>";

            }
            // echo "<br>Min price: ";
            // print_r($min_price);
        }


        //Max Price

        // echo "<br> ExchangeName: " . $exchange[$i][0] . " Buy: " . $exchange[$i][3] . " Max Now: " .$max_price[0][3] . " Flag: " . $exchange[$i][6] . " Gap: " . $exchange[$i][7] . " Sell: " . $exchange[$i][4] . " AmountRial: " . $exchange[$i][4]*$exchange[$i][2] . " Minimum: " . $minimum_buy;
        if((($exchange[$i][3] > $max_price[0][3]) && $exchange[$i][6] == 0/*  && $exchange[$i][7] == 0 */) && ($exchange[$i][4] == 0 || ($exchange[$i][4]*$exchange[$i][2] > $minimum_buy))){
            for($j = 0; $j < sizeof($exchange[0]); $j++){
                $max_price[0][$j] = $exchange[$i][$j];
                // echo "<br> <b class=green>Max Run it</b>";
            }

            // echo "<br>Max price: ";
            // print_r($max_price);
        }

    }

    echo "<br>Min price: ";
    print_r($min_price);

    echo "<br>Max price: ";
    print_r($max_price);



    $current_arbitrage_percent = percent_Arbitrage($max_price[0][3],$min_price[0][2]);

    $current_arbitrage_amount = $max_price[0][3]-$min_price[0][2];

    echo "<br>Current percent arbitrage : " . $current_arbitrage_percent . " Current amount: " . $current_arbitrage_amount;

    echo "<br>Amount arbitrage need to signal : " . Amount_arbitrage($amount_buy,$min_price[0][2],$exchange[0][8]);


    if ($current_arbitrage_amount > Amount_arbitrage($amount_buy,$min_price[0][2],$exchange[0][8])){
        echo "<br><div class='green'>\xF0\x9F\x94\xA5 There is one Signal</div>";

        $origins = $destinations = "";

        // you have money in wallet(bank)
        if($exchange_finance[searchByExchangeName("Wallet",$exchange_finance)]['RIAL'] > $amount_buy / 100 * 35){
            echo "<br>Amount of rial on wallet: " .$exchange_finance[searchByExchangeName("Wallet",$exchange_finance)]['RIAL'];

            $origins .= "\xF0\x9F\x94\xB9\xF0\x9F\x92\xB3 (" .
            $exchange_finance[searchByExchangeName("Wallet",$exchange_finance)]['RIAL'] . 
            ")\n";

        }

        for($i = 0;$i < sizeof($exchange); $i++){

            if ($exchange[$i][2] != 0 && $exchange[$i][2] != NULL){
                $best_sellers = percent_Arbitrage($exchange[$i][2],$min_price[0][2]);
                // echo "<br>XXX(Origin(s)): " . $exchange[$i][0] . " " . $exchange[$i][2] .  " " . $best_sellers;
            }

            //Origin(s)
            // echo "<br>Chceck: " . $exchange[$i][0] . " " .  ($max_price[0][3]-$exchange[$i][2]) ;

            if($max_price[0][3]-$exchange[$i][2] >= Amount_arbitrage($amount_buy,$min_price[0][2],$exchange[0][8]) && $exchange[$i][6] == 0)
            {
                echo "<br>Check signal: " . ($max_price[0][3]-$exchange[$i][2]) ;

                // echo "<br>Current Percent(Origin(s)): " . $exchange[$i][0] . " " . $exchange[$i][2] .  " " . $best_sellers;

                for($j=0; $j < sizeof($exchange[0]); $j++){
                    //add exchange that have good seller
                    $exchange_origin_result[$i][$j] = $exchange[$i][$j];
                }
                // echo "<br> ------------------------ <br>";
                // print_r($exchange_origin_result);
                // echo "<br> ------------------------ <br>";

                // Smart signal (coin and $ in exchanges depending on the amount.)
                
                //index of curent exchange of for loop
                $id_exchange = searchByExchangeName($exchange_origin_result[$i][0],$exchange_finance);

                //Score for Origin exchange
                $SCORE = $exchange_finance[$id_exchange]['SCORE'];
                $SCORE++;
                $ID = $exchange_finance[$id_exchange]['ID'];

                echo "<br> ID:  $ID and SCORE:  " . $SCORE . " ";

                $sql22 = "UPDATE `available` SET SCORE=$SCORE WHERE ID=$ID";

                mysqli_query(Db_conn(),$sql22);

                mysqli_close(Db_conn());

                if($exchange_finance[$id_exchange]['RIAL'] > $amount_buy / 100 * 35)
                {
                    echo "<br><div class=green> Money is here:  " . $exchange_finance[$id_exchange]['EXCHANGE_NAME'] . " Amount: " . $exchange_finance[$id_exchange]['RIAL'] . "</div>";

                    if($exchange[$i][7] == 0){
                        //icon: https://apps.timwhitlock.info/emoji/tables/unicode
                        $origins .= "\xF0\x9F\x94\xA5\xF0\x9F\x92\xB5" .
                        $exchange_origin_result[$i][0] .
                        "  ( " .
                        $exchange_origin_result[$i][2] .
                        " ) " .
                        $best_sellers .
                        " - " .
                        $exchange_origin_result[$i][4] .

                        "\n";
                    }else{// origin as Gap
                        $origins .= "\xF0\x9F\x9A\xA9\xF0\x9F\x92\xB3" .
                        $exchange_origin_result[$i][0] .
                        "  ( " .
                        $exchange_origin_result[$i][2] .
                        " ) " .
                        $best_sellers .
                        " - " .
                        $exchange_origin_result[$i][4] .
                        "\n";
                    }
                }else{
                    
                    echo "<br><div class=red> Money isn't here, not show on bot:  " . $exchange_finance[$id_exchange]['EXCHANGE_NAME'] . " Amount: " . $exchange_finance[$id_exchange]['RIAL'] . " One Score for this Exchange.</div>";

                    if($exchange_finance[searchByExchangeName("Wallet",$exchange_finance)]['RIAL'] > $amount_buy / 100 * 35){
                    /////////////////////////////////////////// Remove from bot exchange that no money there if no rrial in wallet


                    if($exchange[$i][7] == 0){
                        //icon: https://apps.timwhitlock.info/emoji/tables/unicode
                        $origins .= "\xF0\x9F\x94\xB9     " .
                        $exchange_origin_result[$i][0] .
                        "  ( " .
                        $exchange_origin_result[$i][2] .
                        " ) " .
                        $best_sellers .
                        " - " .
                        $exchange_origin_result[$i][4] .
                        "\n";
                    }else{// origin as Gap
                        $origins .= "\xF0\x9F\x9A\xA9     " .
                        $exchange_origin_result[$i][0] .
                        "  ( " .
                        $exchange_origin_result[$i][2] .
                        " ) " .
                        $best_sellers .
                        " - " .
                        $exchange_origin_result[$i][4] .
                        "\n";
                    }

                    /////////////////////////////////////////// Remove from bot exchange that no money there if no rrial in wallet
                    }
                }
           
                // echo "<br> -----------x------------ <br>";
                // print_r($origins);
                // echo "<br> -----------x------------ <br>";

            }

            if ($exchange[$i][3] != 0 && $exchange[$i][3] != NULL){
                $best_buyyers = percent_Arbitrage($exchange[$i][3],$max_price[0][3]);
                // echo "<br>XXX(Destination(s)): " . $exchange[$i][0] . " " . $exchange[$i][3] .  " " . $best_buyyers;
            }
            //Destination(s)

            if($exchange[$i][3]-$min_price[0][2] >= Amount_arbitrage($amount_buy,$min_price[0][2],$exchange[0][8]) && $exchange[$i][6] == 0)
            {
                // echo "<br>Current Percent(Destination(s)): " . $exchange[$i][0] . " " . $exchange[$i][3] .  " " . $best_buyyers;
                
                for($j=0; $j < sizeof($exchange[0]); $j++){
                    $exchange_destination_result[$i][$j] = $exchange[$i][$j];                    
                }

                if($exchange[$i][7] == 0){ 
                    $destinations .= "\xF0\x9F\x94\xB8 " .
                    $exchange_destination_result[$i][0] .
                    "  ( " .
                    $exchange_destination_result[$i][3] .
                    " ) " .
                    $best_buyyers .
                    " - " .
                    $exchange_destination_result[$i][4] .
                    "\n";

                }elseif($exchange[$i][7] == 1){
                    $destinations .= "\xF0\x9F\x9A\xA9 " .
                    $exchange_destination_result[$i][0] .
                    "  ( " .
                    $exchange_destination_result[$i][3] .
                    " ) " .
                    $best_buyyers .
                    " - " .
                    $exchange_destination_result[$i][4] .
                    "\n";
                }
            }       
        }

        if($origins != ""){

            $message =
            "\xF0\x9F\x93\xA3 ".
            $exchange[0][1] .
            "  \xE2\x86\x95 " .
            $current_arbitrage_amount .
            " \xF0\x9F\x93\x88 " .
            $current_arbitrage_percent .
            "% \n\n" .
            $origins .
            " \n ".
            $destinations .
            " \n";

            Telegram($message);
        }
    }

    echo  "<br>----------------<br>";
    echo "Origin: ";
    print_r($exchange_origin_result);
    echo  "<br>----------------<br>";
    echo "Destination: ";
    print_r($exchange_destination_result);
    
    echo "<br><br> Arbitrage amount: " . $current_arbitrage_amount;
    echo "<br>Origins : " . $origins;
    echo "<br>Destinations : " . $destinations;

    echo "<hr>";

}

function Amount_arbitrage($amount_buy,$coin_price,$fee_withdraw){

     $amount_coin = $amount_buy / $coin_price;
     //(( 1000 / 100 ) / 10) * 2 ; 
     $fee_buy = ((( $amount_coin / 100) / 10) * 2) * 2; //fee origin + destination;
     $fee_total = $fee_buy + $fee_withdraw;
     $price_destination = ( $amount_buy + 2000000 ) / ($amount_coin - $fee_total);
     $result = $price_destination - $coin_price;

    return $result;
}

function percent_Arbitrage($high_number,$low_number){
    // echo "<br> High_number: $high_number - Low_number: $low_number";
    $current_arbiterage = 100 - ( $low_number * 100 ) / $high_number;
    return trim(number_format($current_arbiterage, 2));
}

?>