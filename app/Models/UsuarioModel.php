<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model {
  protected $table = 'usuarios';
  protected $primaryKey = 'id';
  protected $useAutoIncrement = true;
  protected $returnType = 'array'; //* object
  protected $useSoftDeletes = false;
  protected bool $allowEmptyInserts = false;
  protected $allowedFields = [
    'id',
    'nombre',
    'apellido',
    'email',
    'usuario',
    'pass',
    'perfil_id',
    'baja'
  ];

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
