<?php

require_once __DIR__ . "/../../main.php";
require_once '../../vendor/autoload.php';

if (is_get()) {

    /**
     * Add your codes here
     */

    echo "Hellp i'm ajax_get.php file and these are your data";
    d($_GET);
}
