<?php

require_once(dirname(__FILE__, 2) . '/app/Config/config.php');
require_once(dirname(__FILE__, 2) . '/app/models/User.php');

$user = new User(['name' => 'Allan', 'email' => 'allan@php.com.br']);


echo User::getSelect(['name' => 1], 'name, email');
echo '<br>';
echo User::getSelect(['name' => 'Allan', 'email' => 'allan@php.com.br']);