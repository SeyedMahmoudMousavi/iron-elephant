# AJAX & PHP

for using ajax open **"/templates/ajax"** directory then use ajax template files

## How to use AJAX :

1.  Add this code to your html :

        <script src="../../modules/ironAjax.js"></script>
        <script src="../../modules/ajaxFunc.js"></script>

2.  Add to your inputs **ajax()** function

        <!-- Get method -->
        <input type="text" onkeyup="ajax('ajax_get.php',myCallBack,'ajax=' + this.value,'GET',showLoader)" />

this send input value to ajax_get.php file
with $\_GET['ajax'] and receive data
then return to myCallBack function

        <!-- POST method -->
        <input type="text" onkeyup="ajax('ajax_post.php', myCallBack,'ajax=' + this.value,'POST',showLoader)" />

this send input value to ajax_post.php file
with $\_GET['ajax'] and receive data
then return to myCallBack function

3.  You most change [**ajax_get.php**](https://github.com/SeyedMahmoudMousavi/iron-elephant/blob/master/templates/ajax/ajax_get.php) or [**ajax_post.php**](https://github.com/SeyedMahmoudMousavi/iron-elephant/blob/master/templates/ajax/ajax_post.php) file and add your codes
    ajax_get.php :

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

    ajax_post.php :

        <?php

        require_once __DIR__ . "/../../main.php";
        require_once '../../vendor/autoload.php';

        if (is_post()) {

            /**
            * Add your codes here
            */

            echo "Hellp i'm ajax_get.php file and these are your data";
            d($_POST);
        }

4.  Then You most change myCallBack function in (ajaxFunc.js) and your own codes

showLoader function use for showing spinner loader :

    // Get element with id message and change value to returned value from .php file
    function myCallBack(str) {
        /**
        * Add your js codes here
        */

        let e = document.getElementById("message");
        e.innerHTML = str;
    }
    function showLoader() {
        // show spinner
    }

## HTML example :

    <!DOCTYPE html>
    <html>

    <head>
    <title>AJAX</title>
    </head>

    <body>
    <form>
        <label>GET</label>
        <!-- Request to ajax_get.php with name ajax and GET method
        then call myCallback
        -->
        <input type="text" onkeyup="ajax('ajax_get.php',myCallBack,'ajax=' + this.value,'GET',showLoader)" />
        <label>POST</label>
        <!-- Request to ajax_post.php with name ajax and POST method
        then call myCallback
        -->
        <input type="text" onkeyup="ajax('ajax_post.php', myCallBack,'ajax=' + this.value,'POST',showLoader)" />
    </form>
    <h1 id="get">get</h1>
    <h1 id="post">post</h1>
    <pre id="message"></pre>
    <script src="../../modules/ironAjax.js"></script>
    <script src="../../modules/ajaxFunc.js"></script>
    </body>

    </html>
