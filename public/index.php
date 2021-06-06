<?php

/**
 * Autoload
 */
require_once ("../vendor/autoload.php");

/**
 * Config
 */
require_once ("../src/config/config.php");
require_once ("../src/models/User.php");

$user = new User(['name'=>'Allan', 'email'=>'allan@php.com.br']);
echo $user->getSelect(['id' => 1], 'name, email');
echo User::getSelect(['name' => 'Allan', 'email' => 'allan@php.com.br']);