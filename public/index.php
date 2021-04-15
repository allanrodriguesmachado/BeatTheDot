<?php

require_once(dirname(__FILE__, 2) . '/src/config/config.php');
require_once(dirname(__FILE__, 2) . '/src/models/User.php');


foreach (User::get([], 'name') as $user){
    echo $user->name;
}