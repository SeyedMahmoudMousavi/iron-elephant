<?php

require_once __DIR__ . "/../../main.php";
require_once '../../vendor/autoload.php';

if(is_get()){

    echo "hellp i'm get php file";
    d($_REQUEST);

}
