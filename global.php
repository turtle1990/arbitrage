<?php

////////////////////////////// Variables

$amount_buy = 500000000; //Rials
$minimum_buy = $amount_buy * 0.02; // 10,000,000 Rials


////////////////////////////// Functions

//Get index of exchange by name from array of exchanges
function GetIndexExchangeByName($EXCHANGE_NAME) {
    global $exchange;
    if ($exchange != NULL || $exchange != ""){
        foreach ($exchange as $key => $val) {
            if ($val[0] === $EXCHANGE_NAME) {
                return $key;
            }
        }
        return NULL;
    }
    return NULL;
    
}

function MinimumBuyOrderObject($orders){
    global $minimum_buy;
    $plus = 0;
    $amount_coin = 0;
    foreach($orders as $key => $value) {

        $amount_coin += $value;
        $plus += ($key * $amount_coin) * 10;

        if($plus > $minimum_buy){
            return $arr = array($key, $amount_coin);
            break;
        }
    }
}

function MinimumBuyOrderObjectArray($orders, $side){
    global $minimum_buy;
    $plus = 0;
    $amount_coin = 0;
    
    // echo "<br> Size of: " . sizeof($orders);

    for($i= 0; $i < sizeof($orders);$i++){

        // echo "<br>Order : ";
        // print_r($orders[$i]);

        if($orders[$i]->side == $side){
            $amount_coin += $orders[$i]->amount;
        $plus += ($orders[$i]->price * $amount_coin) * 10;
        // echo "<br> A: $amount_coin    P: $plus ";

            if($plus > $minimum_buy){
                return $arr = array($orders[$i]->price, $amount_coin);
                break;
            }
        }        
    }
}

function MinimumBuyOrderObjectType($orders, $type){
    global $minimum_buy;
    $plus = 0;
    $amount_coin = 0;
    
    // echo "<br> Size of: " . sizeof($orders);

    for($i= 0; $i < sizeof($orders);$i++){

        // echo "<br>Order : ";
        // print_r($orders[$i]);

        if($orders[$i]->type == $type){
            $amount_coin += $orders[$i]->amount;
        $plus += ($orders[$i]->price * $amount_coin);
        // echo "<br> A: $amount_coin    P: $plus ";

            if($plus > $minimum_buy){
                return $arr = array($orders[$i]->price, $amount_coin);
                break;
            }
        }        
    }
}

function MinimumBuyOrderArray($orders){
    global $minimum_buy;
    $plus = 0;
    $amount_coin = 0;

    for($i=0;$i < sizeof($orders);$i++){

        $amount_coin += $orders[$i][1];
        $plus += ($orders[$i][0] * $amount_coin);
        // echo "<br> Price: " .  $orders[$i][0] . " A: $amount_coin    P: $plus ";

        if($plus > $minimum_buy){
            return $arr = array($orders[$i][0], $amount_coin);
            break;
        }
    }
}

function MinimumBuyOrderArrayRIAL($orders){
    global $minimum_buy;
    $plus = 0;
    $amount_coin = 0;

    for($i=0;$i < sizeof($orders);$i++){

        $amount_coin += $orders[$i][1];
        $plus += ($orders[$i][0] * $amount_coin) * 10;
        // echo "<br> Price: " .  $orders[$i][0] . " A: $amount_coin    P: $plus ";

        if($plus > $minimum_buy){
            return $arr = array($orders[$i][0], $amount_coin);
            break;
        }
    }
}

function MinimumBuyOrderArrayWallexRIAL($orders){
    global $minimum_buy;
    $plus = 0;
    $amount_coin = 0;

    for($i=0;$i < sizeof($orders);$i++){

        $amount_coin += $orders[$i]->quantity;
        $plus += ($orders[$i]->price * $amount_coin) * 10;
        // echo "<br> Price: " .  $orders[$i][0] . " A: $amount_coin    P: $plus ";

        if($plus > $minimum_buy){
            return $arr = array($orders[$i]->price, $amount_coin);
            break;
        }
    }
}

function Str_after($str, $search)
{
    return $search === '' ? $str : array_reverse(explode($search, $str, 2))[0];
}

function ComparatorPrice($object1, $object2) {
    return $object1->price > $object2->price;
}

function ComparatorPriceReverse($object1, $object2) {
    return $object1->price < $object2->price;
}

function ComparatorType($object1, $object2) {
    return $object1->type > $object2->type;
}
?>