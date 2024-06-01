<?php

namespace App\Models;

use CodeIgniter\Model;

class SaleModel extends Model {
  protected $table = 'sales';
  protected $primaryKey = 'id_sale';
  protected $useAutoIncrement = false;
  protected $returnType = 'array';
  protected $useSoftDeletes = false;
  protected bool $allowEmptyInserts = false;
  protected $allowedFields = ['id_sale', 'id_sneaker', 'size', 'quantity', 'price', 'id_user'];

  public function sale_sneaker(array $data): bool|int|string {
    return $this->insert($data);
  }

  public function sale_user(string $id_user): ?array {
    $query = "SELECT * FROM sales WHERE id_user = ?";
    $result = $this->db->query($query, $id_user);
    return $result->getNumRows() > 0 ? $result->getResultArray() : null;
  }
}
