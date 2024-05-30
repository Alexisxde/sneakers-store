<?php

namespace App\Models;

use CodeIgniter\Model;

class MessagesModel extends Model {
  protected $table = 'messages';
  protected $primaryKey = 'id_message';
  protected $useAutoIncrement = true;
  protected $returnType = 'array';
  protected $useSoftDeletes = false;
  protected bool $allowEmptyInserts = false;
  protected $allowedFields = ['id_message', 'email', 'message', 'lastname'];


  public function all_messages() {
    $query = "SELECT * FROM messages";
    $result = $this->db->query($query);
    return $result->getNumRows() > 0 ? $result->getResultArray() : null;
  }
}
