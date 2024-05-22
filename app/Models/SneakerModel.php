<?php

namespace App\Models;

use CodeIgniter\Database\BaseResult;
use CodeIgniter\Model;

class SneakerModel extends Model {
  protected $table = 'sneakers';
  protected $primaryKey = 'id_sneaker';
  protected $returnType = 'array';
  protected $useSoftDeletes = false;
  protected bool $allowEmptyInserts = false;
  protected $allowedFields = [
    'id_sneaker',
    'img',
    'price',
    'discount',
    'brand',
    'model',
    'stars',
    'is_active',
    'description',
  ];

  public function all_products(): ?array {
    $query = "SELECT * FROM sneakers";
    $result = $this->db->query($query);
    return $result->getNumRows() > 0 ? $result->getResultArray() : null;
  }

  public function add_product(array $data): bool|int|string {
    return $this->insert($data);
  }

  public function edit_product(string $id, array $data): bool {
    return $this->update($id, $data);
  }

  public function delete_product(string $id): BaseResult|bool {
    return $this->delete($id);
  }
}
