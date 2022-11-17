<?php

require "vendor/autoload.php";

$db=['localhost','root','','crudmvc'];
$category = new \Route\Db\db($db);

print_r($category->select('category','*')->rows());