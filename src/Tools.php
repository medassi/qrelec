<?php

class Tools {

    public static function makeError($message, $redirection) {
        $_SESSION['error'] = array() ;
        $_SESSION['error']['message'] = $message ;
        $_SESSION['error']['redirection'] = $redirection;
        header('Location: error.php');
    }
}
