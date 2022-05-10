<?php
$api_url = "https://mihanblockchain.com/wp-admin/admin-ajax.php?action=ajax_get_best_exchanges_orders&nonce=982cf09fbf&coin=xrp";
$response_data = json_decode(file_get_contents($api_url));

echo "<pre>";
print_r($response_data);
echo "</pre>";

?>