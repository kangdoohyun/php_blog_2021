<?php
require_once __DIR__ . "/../webinit.php";

list($action) = explode('?', $_SERVER['REQUEST_URI']);

$action = substr($action, 1);

if(empty($action)){
  $action = "usr/article/list";
}
// print_r($action);
// exit;

APP__run($action);