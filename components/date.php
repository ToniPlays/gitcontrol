<?php

class Date {
  static function From($date) {
    return date("d.m.Y H:m:s ", strtotime($date));
  }
}
 ?>
