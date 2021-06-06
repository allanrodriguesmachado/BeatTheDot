<?php

/**
 * Autoload
 */
require_once ("../vendor/autoload.php");

/**
 * Config
 */
require_once ("../src/config/config.php");
//require_once ( VIEW_PATH ."/login.php");

require_once (MODEL_PATH . '/Login.php');
$login = new Login([
    'email' => 'admin@php.com.br',
    'password' => 'a'
]);

try{
    $login->checkLogin();
    echo 'Logado com sucesso';
}catch (Exception $exception){
    echo 'Erro no login';
}