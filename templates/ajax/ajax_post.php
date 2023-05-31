<?php 

require_once __DIR__ . "/../../main.php";
require_once '../../vendor/autoload.php';

if (is_post()) {
    
    echo "hello i'm post php file";
    d($_REQUEST);
    
}