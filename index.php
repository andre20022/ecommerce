<?php 

require_once("vendor/autoload.php");
require_once("vendor/lojinha/php-classes/src/autoload.php");

use \Slim\Slim;
use \src\Page;

$app = new Slim();

$app->config('debug', true);

$app->get('/', function() {
    
	$page = new Page();
    $page->setTpl("index");

});

$app->run();

 ?>