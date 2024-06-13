<?php

namespace App\Models;

use CodeIgniter\Model;

class HeaderSaleModel extends Model {
  protected $table = 'header_sale';
  protected $primaryKey = 'id_sale';
  protected $useAutoIncrement = false;
  protected $returnType = 'array';
  protected $useSoftDeletes = false;
  protected bool $allowEmptyInserts = false;
  protected $allowedFields = ['id_sale', 'date', 'id_user', 'total', 'payment'];

  public function add_header_sale(array $data): bool|int|string {
    return $this->insert($data);
  }

  public function header_sale_user(string $id_user) {
    $query = "SELECT id_user, id_sale, date, total FROM header_sale WHERE id_user = ?";
    $result = $this->db->query($query, [$id_user]);
    return $result->getNumRows() > 0 ? $result->getResultArray() : null;
  }

  public function all_header_sale_user() {
    $query = "SELECT id_user, id_sale, date, total FROM header_sale";
    $result = $this->db->query($query);
    return $result->getNumRows() > 0 ? $result->getResultArray() : null;
  }

  public function get_all_detail(string $id_sale) {
    $query = "SELECT 
    users.name,
    users.surname,
    users.email,
    header_sale.id_sale,
    header_sale.date,
    header_sale.total,
    header_sale.payment,
    sale_detail.sneaker_id,
    sale_detail.size,
    sale_detail.quantity,
    sale_detail.price,
    sneakers.model,
    sneakers.brand
    FROM sale_detail
    INNER JOIN header_sale ON sale_detail.id_sale = header_sale.id_sale
    INNER JOIN sneakers ON sale_detail.sneaker_id = sneakers.id_sneaker
    INNER JOIN users ON header_sale.id_user = users.id_user
    WHERE header_sale.id_sale = ?";
    $result = $this->db->query($query, $id_sale);
    if ($result->getNumRows() > 0) {
      $rows = $result->getResultArray();
      $sale = [
        'id_sale' => $rows[0]['id_sale'],
        'date' => $rows[0]['date'],
        'total' => $rows[0]['total'],
        'payment' => $rows[0]['payment'],
        'fullname' => $rows[0]['name'] . " " . $rows[0]['surname'],
        'email' => $rows[0]['email'],
      ];
      foreach ($rows as $row) {
        $sale['detail'][] = [
          'brand' => $row['brand'],
          'model' => $row['model'],
          'size' => $row['size'],
          'quantity' => $row['quantity'],
          'price' => $row['price']
        ];
      }
      return $sale;
    }
    return null;
  }
}
