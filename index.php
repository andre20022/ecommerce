<?php 
session_start();
require_once("vendor/autoload.php");
require_once("vendor/lojinha/php-classes/src/autoload.php");

use \Slim\Slim;
use \src\Page;
use \src\PageAdmin;
use \src\Model\User;

$app = new Slim();

$app->config('debug', true);

$app->get('/', function() {
    
	$page = new Page();
    $page->setTpl("index");

});
$app->get('/admin', function() {
    
    User::verifyLogin();
	$page = new PageAdmin();
    $page->setTpl("index");

});
$app->get('/admin/login', function() {
    
	$page = new PageAdmin([
        "header" => false,
        "footer" => false
    ]);
    $page->setTpl("login");

});
$app->post('/admin/login', function() {
    
    User::login($_POST["login"], $_POST["password"]);
    header("location: /admin");
	exit;

});
$app->get('/admin/logout', function() {
    
	User::logout();
    header("location: /admin/login");
    exit;

});

$app->run();

 ?>