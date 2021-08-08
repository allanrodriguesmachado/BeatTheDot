<?php

require_once(dirname(__FILE__, 2) . '/app/Config/config.php');
require_once(dirname(__FILE__, 2) . '/app/models/User.php');

$user = new User(['name' => 'Allan', 'email' => 'allan@php.com.br']);
print_r($user);
echo 'fim';