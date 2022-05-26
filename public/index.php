<?php


require_once(dirname(__FILE__, 2) . '/app/config/config.php');
require_once(dirname(__FILE__, 2) . '/app/models/User.php');

//echo USER::getSelect(['id'=> 1 ], 'name, email');
//echo User::getSelect(['name' => 'Chaves', 'email' => 'allan@php.com']);

print_r(USER::get(['id'=> 1 ], 'name, email'));

foreach (User::get([], 'name') as $user) {
    echo "<pre>";
    print_r($user->name);
    echo "</pre>";
}