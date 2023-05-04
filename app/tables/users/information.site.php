<?php
session_start();
use App\models\Information;
include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$tagline = Information::getTagline();
$allAboutAs = Information::getWeShouldTrust();
$allAboutAs1 = Information::getPhone();
$allAboutAs2 = Information::getMail();
$allAboutAs3 = Information::getSocial();
include $_SERVER["DOCUMENT_ROOT"] . "/views/products/info.view.php";