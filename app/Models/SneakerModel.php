<?php

namespace App\Models;

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

  public function all_sneakers(): ?array {
    $query = "SELECT * FROM sneakers";
    $result = $this->db->query($query);
    return $result->getNumRows() > 0 ? $result->getResultArray() : null;
  }

  public function featured(int $stars = 1, int $discount = 10, string $order = "ASC", int $limit = 5): ?array {
    $query = "SELECT * FROM sneakers WHERE stars > $stars AND discount > $discount AND is_active = 1 ORDER BY price $order LIMIT $limit";
    $result = $this->db->query($query);
    return $result->getNumRows() > 0 ? $result->getResultArray() : null;
  }

  public function add_sneaker(array $data): bool|int|string {
    return $this->insert($data);
  }

  public function edit_sneaker(string $id, array $data): bool {
    return $this->update($id, $data);
  }
}
