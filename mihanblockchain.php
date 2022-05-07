<?php



// ============================ Variables =============================

$exchange = array();
// array index: array('Name of exchange','coin',best price sell,best price buy,amount sell,amount buy, Flag, Gap, fee withdraw);
array_push($exchange, array("Exchange", "Coin", 0, 0, 0, 0, 0, 0, 0));

function Mihanblockchain($coin){

    // ============================ Source of coins =============================

    switch ($coin) {
        case "USDT" : $html_coin = file_get_html("https://mihanblockchain.com/exchange-prices/#usdt");  
                     break;
        case "XRP" : $html_coin = file_get_html("https://mihanblockchain.com/exchange-prices/#xrp");
                     break;
        case "DOT" : $html_coin = file_get_html("https://mihanblockchain.com/exchange-prices/#dot");
                     break;
        case "DOGE" : $html_coin = file_get_html("https://mihanblockchain.com/exchange-prices/#doge");
                     break;
        case "XLM" : $html_coin = file_get_html("https://mihanblockchain.com/exchange-prices/#xlm");
                     break;
        case "EOS" : $html_coin = file_get_html("https://mihanblockchain.com/exchange-prices/#eos");
                     break;
        case "TRX" : $html_coin = file_get_html("https://mihanblockchain.com/exchange-prices/#trx");
                     break;
        case "ADA" : $html_coin = file_get_html("https://mihanblockchain.com/exchange-prices/#ada");
                     break;
        case "BNB" : $html_coin = file_get_html("https://mihanblockchain.com/exchange-prices/#bnb");
                     break;
        case "DAI" : $html_coin = file_get_html("https://mihanblockchain.com/exchange-prices/#dai");
                     break;
        case "LTC" : $html_coin = file_get_html("https://mihanblockchain.com/exchange-prices/#ltc");
                     break;
        default : $html_coin = Telegram("Invalid Input!");
    }

        // if site is work....
        if ($html_coin->find('#exchanges-tabContent', 0)) {

        //     foreach($html_coin->find('table#exchange-prices') as $postDiv)
        // {
        //     echo ($postDiv);
        // }

        $i = 0;

        // foreach ($html_coin->find('div.exp-holder div#exchanges-tabContent div#usdt-table table.exp-main-table') as $tr) {

        //     echo "<pre>";
        //     print_r( $tr->tbody );
        //     echo "</pre>";


        
        // $i++;

            
        // }


        foreach($html_coin->find('div#btc-table table tbody tr') as $element) {
            echo "<pre>";
            print_r( $element->class );
            echo "</pre>";
        }



    }else{
        echo 'Mihanblockchain is down or changed!.';
        Telegram("Mihanblockchain is down or changed!");
    }

}
?>