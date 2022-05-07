<?php

require_once ("db_conn.php");

if(count($_POST)>0) 
{
    $ID = $_POST['ID'];
    $SCORE = $_POST['SCORE'];
    $EXCHANGE_NAME = $_POST['EXCHANGE_NAME'];
    $RIAL = $_POST['RIAL'];
    $USDT = $_POST['USDT'];
    $XRP = $_POST['XRP'];
    $DOT = $_POST['DOT'];
    $DOGE = $_POST['DOGE'];
    $XLM = $_POST['XLM'];
    $EOS = $_POST['EOS'];
    $TRX = $_POST['TRX'];
    $BNB = $_POST['BNB'];
    $MATIC = $_POST['MATIC'];
    $DAI = $_POST['DAI'];
    $LTC = $_POST['LTC'];


    $sql = "UPDATE `available` SET 
    RIAL='$RIAL',
    USDT='$USDT' ,
    XRP='$XRP' ,
    DOT='$DOT' ,
    DOGE='$DOGE' ,
    XLM='$XLM' ,
    EOS='$EOS' ,
    TRX='$TRX' ,
    BNB='$BNB' ,
    MATIC='$MATIC' ,
    DAI='$DAI' , 
    LTC='$LTC'
     WHERE ID=$ID";

    mysqli_query(Db_conn(), $sql);

    mysqli_close(Db_conn());

}



?>