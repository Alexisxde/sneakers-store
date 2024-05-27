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

  public function one_sneaker(string $id): ?array {
    $query = "SELECT * FROM sneakers WHERE id_sneaker = ?";
    $result = $this->db->query($query, $id);
    return $result->getNumRows() > 0 ? $result->getResultArray() : null;
  }

  public function all_sneakers(int $page = 1): ?array {
    $items_page = 6;
    $page = max(1, $page);
    $offset = ($page - 1) * $items_page;
    $query = "SELECT * FROM sneakers LIMIT $items_page OFFSET $offset";
    $result = $this->db->query($query);
    return $result->getNumRows() > 0 ? $result->getResultArray() : null;
  }

  public function add_sneaker(array $data): bool|int|string {
    return $this->insert($data);
  }

  public function edit_sneaker(string $id, array $data): bool {
    return $this->update($id, $data);
  }

  public function delete_sneaker(string $id): BaseResult|bool {
    return $this->delete($id);
  }
}
