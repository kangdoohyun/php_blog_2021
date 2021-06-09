<?php
require_once __DIR__ . "/../webinit.php";

$REQUEST_URI = $_SERVER['REQUEST_URI'];

if($REQUEST_URI == "/"){
  jsLocationReplaceExit("usr/article/list");
}

list($action) = explode('?', $REQUEST_URI);

$action = substr($action, 1);

APP__run($action);