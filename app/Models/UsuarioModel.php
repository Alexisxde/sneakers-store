<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model {
  protected $table = 'usuarios';
  protected $primaryKey = 'id';
  protected $useAutoIncrement = true;
  protected $returnType = 'array';
  protected $useSoftDeletes = false;
  protected bool $allowEmptyInserts = false;
  protected $allowedFields = [
    'id',
    'username',
    'name',
    'surname',
    'email',
    'password',
    'register_date',
    'rol',
  ];

  public function username_exist(string $username): bool {
    $query = "SELECT COUNT(*) as count FROM usuarios WHERE username = ?";
    $result = $this->db->query($query, [$username])->getRow();
    return $result->count > 0;
  }

  public function email_exist(string $email): bool {
    $query = "SELECT COUNT(*) as count FROM usuarios WHERE email = ?";
    $result = $this->db->query($query, [$email])->getRow();
    return $result->count > 0;
  }

  public function validar_credenciales(string $username, string $passwordUser): bool {
    $query = "SELECT * FROM usuarios WHERE username = ?";
    $result = $this->db->query($query, [$username])->getRow();
    if ($result == null) return false;
    return password_verify($passwordUser, $result->password);
  }

  public function obtener_usuario(string $username): ?array {
    $query = "SELECT id, username, token, name, surname, rol FROM usuarios WHERE username = ?";
    $result = $this->db->query($query, [$username]);
    return $result->getNumRows() > 0 ? $result->getRowArray() : null;
  }

  public function agregar_usuario($data) {
    return $this->insert($data);
  }

  public function editar_usuario($id, $data) {
    return $this->update($id, $data);
  }

  public function borrar_usuario($id) {
    return $this->delete($id);
  }
}
