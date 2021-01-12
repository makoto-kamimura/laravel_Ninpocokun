<?php
require_once('./Validation.php');

$title = "";
$author = "";
$publisher = "";
$price = '';

$validate = new Validation($title, $author, $publisher, $price);
$error_array = $validate->validate();

var_dump($error_array);