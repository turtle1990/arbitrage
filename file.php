<?php

function File($text){
    $myfile = fopen("log.txt", "a") or die("Unable to open file!");
    fwrite($myfile, "\n". $text);
    fclose($myfile);
}
?>