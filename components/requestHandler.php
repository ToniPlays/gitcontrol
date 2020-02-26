<?php
require "../config.php";
$handler = new RequestHandler(json_decode($_GET['r'], true), $gitClient);
$handler->FetchItems();
$handler->Send();

class RequestHandler {
  static $request;
  static $client;
  static $status = 0;
  static $items = [];
  static $errors = [];

  //Construct new insntace
  function __construct($request, $gitClient) {
    self::$request = $request;
    self::$client = $gitClient;
  }
  //Fetch all items and push to items
  function FetchItems() {
    foreach (self::$request['items'] as $item) {
      $class = array_keys($item)[0];
      foreach (array_keys($item[$class]) as $fn) {
        if(method_exists($class, $fn)) {
          $result = $class::$fn($item[$class][$fn], self::$client);
          array_push(self::$items, $result);
        }
        else self::Error("Method $class::$fn does not exist", 2);
      }
    }
  }
  static function Error($title, $status) {
    if($status > self::$status)
      self::$status = $status;
    array_push(self::$errors, array("title" => $title, "status" => $status));
  }
  //Create and send created response
  function Send() {
    $json = array("kind" => self::$request['request'], "status" => self::$status);
    $json['items'] = self::$items;
    $json['errors'] = self::$errors;
    echo json_encode($json);
  }
}
?>
