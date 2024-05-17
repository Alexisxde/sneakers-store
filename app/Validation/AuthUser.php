<?php

namespace App\Validation;

use Config\Database;

class AuthUser {
  public function validate_username(string $str, string $field): bool {
    if (is_object($str) || is_array($str)) {
      return false;
    }
    sscanf($field, '%[^.].%[^.]', $table, $field);
    $row = Database::connect($data['DBGroup'] ?? null)
      ->table($table)
      ->select('username')
      ->where($field, $str);
    return $row->get()->getRow() !== null;
  }
}
