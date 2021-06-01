<?php
session_start();
require_once __DIR__ . "/util.php";

$memberIdInSession = getIntValueOr($_SESSION['loginedMemberId'], 0);

$dbConnect = mysqli_connect("127.0.0.1", "sbsst", "sbs123414", "php_blog_2021") or die("DB CONNECTION ERROR");