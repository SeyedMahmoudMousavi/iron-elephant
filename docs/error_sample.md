        try {

        }
        catch (Throwable|Error|Exception|TypeError $e) {
            $file = $e->getFile();
            $line = $e->getLine();
            $message = $e->getMessage();
            echo "<h1>File : $file</h1><h2>Line : $line</h2><h2>Error : $message</h2>";
            die();
        }