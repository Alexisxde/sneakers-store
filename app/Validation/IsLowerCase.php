<?php

namespace App\Validation;

class IsLowerCase {
  function is_lowercase($str) {
    return strtolower($str) === $str;
  }
}
