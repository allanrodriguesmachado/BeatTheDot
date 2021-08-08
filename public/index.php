<?php

require_once(dirname(__FILE__, 2) . '/app/Config/Database.php');

$sql = 'select * from users';

$result = Database::getResultFromQuery($sql);

while($row = $result->fetch_assoc()){
    print_r($row);
    echo '<br>';
}