<?php
class Date {
  static function From($date) {
    //Format yyyy-mm-ddThh:mm:ss to normal date
    return date("d.m.Y H:m:s ", strtotime($date));
  }
}
 ?>
