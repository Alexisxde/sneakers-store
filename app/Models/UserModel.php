<?php

namespace App\Models;

use CodeIgniter\Database\BaseResult;
use CodeIgniter\Model;

class UserModel extends Model {
  protected $table = 'users';
  protected $primaryKey = 'id_user';
  protected $returnType = 'array';
  protected $useSoftDeletes = false;
  protected bool $allowEmptyInserts = false;
  protected $allowedFields = [
    'id_user',
    'username',
    'password',
    'email',
    'name',
    'surname',
    'register_date',
    'is_active',
    'rol'
  ];

  public function user_data(string $username): ?array {
    $query = "SELECT id_user, email, username, name, surname, rol, is_active FROM users WHERE username = ?";
    $result = $this->db->query($query, [$username]);
    return $result->getNumRows() > 0 ? $result->getRowArray() : null;
  }

  public function user_data_id(string $id_user): ?array {
    $query = "SELECT id_user email, username, name, surname, rol, is_active FROM users WHERE id_user = ?";
    $result = $this->db->query($query, [$id_user]);
    return $result->getNumRows() > 0 ? $result->getRowArray() : null;
  }

  public function validate_password(string $username, string $passwordUser): bool {
    $query = "SELECT * FROM users WHERE username = ?";
    $result = $this->db->query($query, [$username])->getRow();
    if ($result === null) return false;
    return password_verify($passwordUser, $result->password);
  }

  public function all_users(string $id_user): ?array {
    $query = "SELECT id_user, username, email, name, surname, rol, is_active FROM users WHERE username <> 'admin' AND id_user <> ?";
    $result = $this->db->query($query, [$id_user]);
    return $result->getNumRows() > 0 ? $result->getResultArray() : null;
  }

  public function add_user(array $data): bool|int|string {
    return $this->insert($data);
  }

  public function edit_user(string $id, array $data): bool {
    return $this->update($id, $data);
  }
}
