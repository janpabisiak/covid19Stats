/**
* A simple script written in PHP that displays COVID-19 stats.
* @license GNU General Public License
* @author Jan Pabisiak
* @copyright 2021 Jan Pabisiak
*/
<?php
    function CurrentDate() {
        return date("Y-m-d H:i:s");
    }

    function redirect($url = null) {
        // if no url assume redirect to self
        if (is_null($url)) {
            $url = $_SERVER['PHP_SELF'];
        }
    
        // if no headers sent
        if (!headers_sent()) {
            header('location: ' . $url);
            exit;
        }
    
        // fallback to meta/javascript redirect
        echo '<script type="text/javascript">';
        echo 'window.location.href="' . $url . '";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url=' . $url . '" />';
        echo '</noscript>';
        exit;
    }
?>
