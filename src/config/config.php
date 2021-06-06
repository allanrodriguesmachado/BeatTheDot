<?php

date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf8', 'portuguese');


/**
 * PASTAS CONSTANTES
 */

define('MODEL_PATH', realpath(dirname(__FILE__) . '/../models'));
define('VIEW_PATH', realpath(dirname(__FILE__) . '/../views'));


/**
 * ARQUIVOS IMPORTADOS
 */
require_once (realpath(dirname(__FILE__) . '/Database.php'));
require_once (realpath(MODEL_PATH . '/Model.php'));