<?php

require_once (dirname(__FILE__,2) . '/src/Config/Database.php');

Database::getConnection();

echo "Tudo Certo";