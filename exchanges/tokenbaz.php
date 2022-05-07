<?php


// ============================ Variables =============================

 $exchange = array();
// array index: array('Name of exchange','coin',best price sell,best price buy,amount sell,amount buy, Flag, Gap, fee withdraw);
// array_push($exchange, array("Exchange", "Coin", 0, 0, 0, 0, 0, 0, 0));

function Tokenbaz($coin)
{
    global $exchange;
    
// ============================ Source of coins =============================

    switch ($coin) {
        case "USDT" : $html_coin = file_get_html("https://tokenbaz.com/coins/tether");
                     break;
        case "XRP" : $html_coin = file_get_html("https://tokenbaz.com/coins/ripple");
                     break;
        case "DOT" : $html_coin = file_get_html("https://tokenbaz.com/coins/polkadot");
                     break;
        case "DOGE" : $html_coin = file_get_html("https://tokenbaz.com/coins/dogecoin");
                     break;
        case "XLM" : $html_coin = file_get_html("https://tokenbaz.com/coins/stellar");
                     break;
        case "EOS" : $html_coin = file_get_html("https://tokenbaz.com/coins/eosio");
                     break;
        case "TRX" : $html_coin = file_get_html("https://tokenbaz.com/coins/tron");
                     break;
        case "ADA" : $html_coin = file_get_html("https://tokenbaz.com/coins/cardano");
                     break;
        case "BNB" : $html_coin = file_get_html("https://tokenbaz.com/coins/binance-coin");
                     break;
        case "MATIC" : $html_coin = file_get_html("https://tokenbaz.com/coins/matic-network");
                     break;
        case "DAI" : $html_coin = file_get_html("https://tokenbaz.com/coins/dai");
                     break;
        case "LTC" : $html_coin = file_get_html("https://tokenbaz.com/coins/litecoin");
                     break;
        default : $html_coin = Telegram("Invalid Input!");
    }

    // if site is work....
    if ($html_coin->find('table#exchange-prices', 0)) {

        //     foreach($html_coin->find('table#exchange-prices') as $postDiv)
        // {
        //     echo ($postDiv);
        // }

        $i = 0;

        foreach ($html_coin->find('table#exchange-prices tbody.prices tr[data-pair=IRR]') as $tr) {
            if (!empty($tr->find('h6 a[title]', 0)->{'title'})) {
                $title_exchange = parse_url($tr->find('h6 a[title]', 0)->{'href'}, PHP_URL_HOST);


                // Edit name of exchange
                switch ($title_exchange) {
                    case "pro.exir.io" : $exchange[$i][0] = "Exir";
                    break;
                    case "exnovin.io" : $exchange[$i][0] = "Exnovin";
                    break;
                    case "wallex.ir" : $exchange[$i][0] = "Wallex";
                    break;
                    case "changekon.com" : $exchange[$i][0] = "Changekon";
                    break;
                    case "nobitex.ir" : $exchange[$i][0] = "Nobitex";
                    break;
                    case "pingi.ir" : $exchange[$i][0] = "Pingi";
                    break;
                    case "bitpin.ir" : $exchange[$i][0] = "Bitpin";
                    break;
                    case "www.iranicard.ir" : $exchange[$i][0] = "Iranicard";
                    case "panel.iranicard.ir" : $exchange[$i][0] = "Iranicard";
                    //https://api.iranicard.ir/api/modules/crypto/v1/client/listProduct
                    break;
                    case "arzpaya.com" : $exchange[$i][0] = "Arzpaya";
                    break;
                    case "dollarkadeh.org" : $exchange[$i][0] = "Dollarkadeh";
                    break;
                    case "huluex.com" : $exchange[$i][0] = "Huluex";
                    break;
                    case "abantether.com" : $exchange[$i][0] = "Abantether";
                    break;
                    case "auth.saraf.io" : $exchange[$i][0] = "Saraf";
                    break;
                    case "rabincash.com" : $exchange[$i][0] = "Rabincash";
                    break;
                    case "ramzinex.com" : $exchange[$i][0] = "Ramzinex";
                    break;
                    case "app.ompfinex.com" : $exchange[$i][0] = "Ompfinex";
                    break;
                    case "jibitex.com" : $exchange[$i][0] = "Jibitext";
                    break;
                    case "hamiexchange.com" : $exchange[$i][0] = "Hamiexchange";
                    break;

                    default : $exchange[$i][0] = $title_exchange;
                }

                $exchange[$i][1] = $coin;
                $exchange[$i][2] = intval($tr->{'data-sell-price'} * 10);
                $exchange[$i][3] = intval($tr->{'data-buy-price'} * 10);
                $exchange[$i][4] = floatval($tr->find('td[data-amount]', 0)->{'data-amount'});
                $exchange[$i][5] = floatval($tr->find('td[data-amount]', 1)->{'data-amount'});
                $exchange[$i][6] = 0; //Flag
                $exchange[$i][7] = 0; //Gap
                $exchange[$i][8] = Fee_table($coin);

                $i++;
            }
        }

        echo "<br>Number of Exchange: ". $coin . " " .  $i . "<br>";

        return $exchange;



    } else {
        echo 'Tokenbaz is down or changed!.';
        Telegram("Tokenbaz is down or changed!");
    }
}
?>