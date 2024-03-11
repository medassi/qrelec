<?php
session_start();
spl_autoload_register(function ($className) {
    $classNameR = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    include_once 'src/' . $classNameR . '.php';
});

$controller = new controllers\CommonController("connexion");
