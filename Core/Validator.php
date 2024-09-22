<?php

namespace Core;

class Validator {
  public static function isValidString($value, $minLength = 0, $maxLength = INF) {
    $str = trim($value);
    return $str !== '' && strlen($str) >= $minLength && strlen($str) <= $maxLength;
  }

  public static function isValidEmail($value) {
    return filter_var($value, FILTER_VALIDATE_EMAIL);
  }
}