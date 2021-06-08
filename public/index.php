<?php
require_once __DIR__ . "/../webinit.php";

list($action) = explode('?', $_SERVER['REQUEST_URI']);

$action = substr($action, 1);

APP__run($action);