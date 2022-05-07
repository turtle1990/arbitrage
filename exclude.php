<?php

function Exclude($exchange,$exchange_name,$coin){

    for($i = 0; $i < sizeof($exchange); $i++){
        if ($exchange[$i][0] == $exchange_name && $exchange[$i][1] == $coin){
            $exchange [$i][6] = 1; //flag;
        }
    }

    return $exchange;
}

function Gap($exchange,$want_arbitrage_percent){

    for($i = 0; $i < sizeof($exchange); $i++){
        $exchange_percent_arbitrage = percent_Arbitrage($exchange[$i][2],$exchange[$i][3],$want_arbitrage_percent);
        if ($exchange_percent_arbitrage > $want_arbitrage_percent * 3 ){
            $exchange[$i][7] = 1;//Gap find
        }
    }

    return $exchange;
}

?>