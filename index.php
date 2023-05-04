<?php
session_start();
use App\models\Stocks;
use App\models\Brand;
use App\models\Information;
use App\models\Comments;
include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
$stocks = Stocks::getAll();
$brands = Brand::allGet();
$com5last = Comments::get5LastAll();
$questions = Information::getAlltopicalIssues();
json_encode($stocks, JSON_UNESCAPED_UNICODE);
include $_SERVER["DOCUMENT_ROOT"] . "/views/products/index.view.php";


