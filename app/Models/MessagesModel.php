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
  protected $allowedFields = ['id_message', 'email', 'message', 'lastname', 'message_read'];

  public function all_messages(): ?array {
    $query = "SELECT * FROM messages";
    $result = $this->db->query($query);
    return $result->getNumRows() > 0 ? $result->getResultArray() : null;
  }

  public function update_message(string $id_message, array $data): void {
    $this->update($id_message, $data);
  }
}
