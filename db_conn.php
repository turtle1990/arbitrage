<?php
    //Connect to database arbitrage
    function Db_conn(){

        $serverName = "localhost";
        $userName = "root";
        $password = "usbw";
        $dbName = "arbitrage";

        // $serverName = "localhost";
        // $userName = "mjtbir_mojtaba";
        // $password = ")k+$9Aa%}P6F";
        // $dbName = "mjtbir_arbitrage";

        $conn = mysqli_connect($serverName, $userName, $password, $dbName);

            // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
            Telegram("Connect to database Error!");
            return null;
        }

        return $conn;
    }
?>