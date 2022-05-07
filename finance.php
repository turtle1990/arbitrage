<?php ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL); ?>
<?php

require_once 'db_conn.php';

?>

<html>
<head>
<meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.css" />
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css" /> -->
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
</head>


<?php

$sql = "SELECT * FROM `available`";

$result = mysqli_query(Db_conn(),$sql) or die("Error: ".mysqli_error(Db_conn()));
$ajax = "";

while($obj = mysqli_fetch_object($result)){
    $ajax .= "{ 
        ID:'" . $obj->ID . "',
        SCORE:'" . $obj->SCORE . "',
        EXCHANGE_NAME:'" . $obj->EXCHANGE_NAME ."',
        RIAL:'" . $obj->RIAL ."',
        USDT:'" . $obj->USDT ."',
        XRP:'" . $obj->XRP ."',
        DOT:'" . $obj->DOT ."',
        DOGE:'" . $obj->DOGE ."',
        XLM:'" . $obj->XLM ."',
        EOS:'" . $obj->EOS ."',
        TRX:'" . $obj->TRX ."',
        BNB:'" . $obj->BNB ."',
        MATIC:'" . $obj->MATIC ."',
        DAI:'" . $obj->DAI ."',
        LTC:'" . $obj->LTC ."'},
        ";
}

mysqli_close(Db_conn());

?>

<div class="container">
  
  <!-- <button class="btn btn-primary" id="addbutton" title="Add"><span class="fa fa-plus-square"></span></button> -->

<h2>
    <img src="img/icons8-bitcoin.gif" width="32px" height="32px">
    Mojtaba Finance
</h2>

<table cellpadding="0" cellspacing="0" class="dataTable table table-striped" id="example"></table>

</div>

<script src="https://code.jquery.com/jquery-3.0.0.js" ></script>
<script src="https://code.jquery.com/jquery-migrate-3.3.0.js" ></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js" ></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.js" ></script>
<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js" ></script>
<!-- <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.js" ></script> -->
<script src="plugin/DataTable-AltEditor-master/src/dataTables.altEditor.free.js" ></script>
<script>
    var dataSet = [<?php echo $ajax;?>];
</script>
<script src="js/script.js"></script>

</body>

</html>
