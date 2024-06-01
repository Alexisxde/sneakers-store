<?php

namespace App\Models;

use CodeIgniter\Model;

class StockModel extends Model {
  protected $table = 'stock';
  protected $primaryKey = 'id_stock';
  protected $useAutoIncrement = true;
  protected $returnType = 'array';
  protected $useSoftDeletes = false;
  protected bool $allowEmptyInserts = false;
  protected $allowedFields = ['id_stock', 'id_sneaker', 'id_size', 'quantity'];

  public function all_stock(string $id): ?array {
    $query = "SELECT * FROM stock WHERE id_sneaker = ?";
    $result = $this->db->query($query, $id);
    return $result->getNumRows() > 0 ? $result->getResultArray() : null;
  }

  public function one_stock(string $id, string $size): ?array {
    $query = "SELECT id_sneaker, size, quantity FROM stock WHERE id_sneaker = ? AND size = ?";
    $result = $this->db->query($query, [$id, $size]);
    return $result->getNumRows() > 0 ? $result->getResultArray() : null;
  }

  public function update_stock(string $id_sneaker, int $size, int $quantity): void {
    $query = "UPDATE stock SET quantity = ? WHERE id_sneaker = ? AND size = ?";
    $result = $this->db->query($query, [$quantity, $id_sneaker, $size]);
  }

  public function edit_stock(string $id_sneaker, $size, $quantity) {
    $query = "INSERT INTO `stock`(`id_sneaker`, `size`, `quantity`) VALUES ($id_sneaker, $size, $quantity)";
    $result = $this->db->query($query);
    return $result->getNumRows() > 0 ? $result->getResultArray() : null;
  }
}
