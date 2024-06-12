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
    'price_purchase',
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
    return $result->getNumRows() > 0 ? $result->getRowArray() : null;
  }

  public function one_sneaker_join(string $id): ?array {
    $query = "SELECT sneakers.*, stock.size, stock.quantity FROM sneakers INNER JOIN stock ON stock.id_sneaker = sneakers.id_sneaker WHERE sneakers.id_sneaker = ?";
    $result = $this->db->query($query, $id);
    if ($result->getNumRows() > 0) {
      $rows = $result->getResultArray();
      $sneaker = [
        'id_sneaker' => $rows[0]['id_sneaker'],
        'img' => $rows[0]['img'],
        'price' => $rows[0]['price'],
        'discount' => $rows[0]['discount'],
        'model' => $rows[0]['model'],
        'brand' => $rows[0]['brand'],
        'stars' => $rows[0]['stars'],
        'description' => $rows[0]['description'],
      ];
      foreach ($rows as $row) {
        $sneaker['stock'][] = [
          'size' => $row['size'],
          'quantity' => $row['quantity']
        ];
      }
      return $sneaker;
    }
    return null;
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
