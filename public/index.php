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
print_r(User::get(['id' => 1], 'name, email'));

echo '<br>';
foreach (User::get([], 'name') as $user){
    echo $user->name;
    echo '<br>';
}