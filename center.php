<?php ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);ini_set('max_execution_time', 300); ?>
<?php $start_time = microtime(true); ?>

<html>
    <head>
        <title>Status of Exchange</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

    <?php
        require_once("global.php");
        require_once("exchanges/tokenbaz.php");
        require_once("exchanges/mihanblockchain.php");
        require_once("exchanges/nobitex.php");
        require_once("exchanges/ramzinex.php");
        require_once("exchanges/changekon.php");
        require_once("exchanges/wallex.php");
        require_once("exchanges/ompfinex.php");
        require_once("exchanges/rabincash.php");
        require_once("exchanges/exnovin.php");
        require_once("exchanges/bitimen.php");
        require_once("exchanges/bitbarg.php");
        require_once("exchanges/dollarkadeh.php");
        include('plugin/simple_html_dom/simple_html_dom.php'); //work with html dom.
        require_once('fee.php');
        require_once("Tel_bot.php");
        require_once("arbiterage.php");

        global $exchange;

        // output data of each row
        ////////////////////////////// DB connection  /////////////////////////
        
        $sql = "SELECT * FROM `available`";
        $result = mysqli_query(Db_conn(),$sql) or die("Error: ".mysqli_error(Db_conn()));
        
        $i = 0;
        while($row = $result->fetch_assoc()){
            $exchange_finance[$i] = $row;
            $i++;
        }

        Db_conn()->close();

        // echo "<pre>";
        // print_r($exchange_finance);
        // echo "</pre>";

        //////////////////////////////////////////////////////////////////////////

        $time_start = microtime(true); 

        // $coins = array("USDT","XRP","DOT","XLM","TRX","BNB","MATIC","LTC","EOS","DOGE","ADA","DAI");
        $coins = array("USDT");
        
        Changekon("ALLTYPE");// one ajax and get all cryptocurrency
        foreach ($coins as $coin){
            Tokenbaz($coin);
            Nobitex($coin);
            Changekon($coin);
            Ramzinex($coin);
            Wallex($coin);
            Ompfinex($coin);
            Exnovin($coin);
            Bitimen($coin);
            Bitbarg($coin);
            Rabincash($coin);
            Dollarkadeh($coin);
            Mihanblockchain($coin);
            Arbitrge(0.68);
            echo "<br>Number of Exchange: ". $coin . " " .  sizeof($exchange) . "<br>";
            // unset($exchange);
        }
        
        echo "<br> Number of Global Exchange: " . sizeof($GLOBALS['exchange']);

        echo "<pre>";
        print_r($exchange);
        echo "</pre>";

        $time_end = microtime(true);
        $execution_time = ($time_end - $time_start);
        echo '<b>Total Execution Time:</b> '.$execution_time.' Secs';

        

    ?>
    </body>
</html>

