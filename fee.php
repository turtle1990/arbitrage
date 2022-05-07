<?php

    function Fee_table($coin){
        switch ($coin) {
            case "USDT" : return 1;
            break;
            case "XRP" : return 0.1;
            break;
            case "DOT" : return 0.1;
            break;
            case "DOGE" : return 5;
            break;
            case "XLM" : return 0.01;
            break;
            case "EOS" : return 0.1;
            break;
            case "TRX" : return 3;
            break;
            case "ADA" : return 1;
            break;
            case "BNB" : return 0.001;
            break;
            case "MATIC" : return 0.1;
            break;
            case "DAI" : return 1;
            break;
            case "LTC" : return 0.001;
            break;
            default : return 0.01;
        }
    }

?>