<?php

// ? Créer utilisateur autre que root pour la connexion à la bdd 
/* 
CREATE USER 'CoopConsommateur'@'%' 
IDENTIFIED VIA mysql_native_password USING '***';
GRANT SELECT, INSERT, UPDATE, DELETE, FILE ON *.* TO 'CoopConsommateur'@'%' 
REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0; 
*/

setlocale(LC_TIME, 'fr_FR.UTF-8');
date_default_timezone_set('Europe/Paris');

define('DIR_BASE', __DIR__ . '/../');
define('DIR_CONFIG', DIR_BASE . 'Config/');
define('DIR_CONTROLLER', DIR_BASE . 'Controller/');
define('DIR_MODEL', DIR_BASE . 'Model/');
define('DIR_VIEW', DIR_BASE . 'View/');
define('DIR_PRIVATE', DIR_BASE . 'Private/');
define('DIR_PUBLIC', DIR_BASE . 'Public/');

/* Avec Composer Autoload */
require_once DIR_BASE . 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(DIR_BASE);
$dotenv->safeLoad();

ini_set("display_errors", "off");
error_reporting(E_ALL);

set_error_handler(['Controller\ExceptionHandler', 'PhpErrors'], E_ALL);
register_shutdown_function(['Controller\ExceptionHandler', 'PhpFatalErrors']);

define('BASE_HREF', '/');

define('DB_HOST', $_ENV['DB_HOST']);
define('DB_PORT', $_ENV['DB_PORT']);
define('DB_NAME', $_ENV['DB_NAME']);
define('DB_USER', $_ENV['DB_USER']);
define('DB_PASSWORD', $_ENV['DB_PASSWORD']);

require_once DIR_CONFIG . 'routes.php';
