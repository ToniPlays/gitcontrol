<?php
require_once __DIR__ . '/vendor/autoload.php';

$gitClient = new \Github\Client();

//Autoload required file from "components"-folder
spl_autoload_register(function($class) {
  require "components/".$class.".php";
});
?>
