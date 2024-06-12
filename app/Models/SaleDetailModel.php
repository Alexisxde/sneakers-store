<?php

namespace App\Models;

use CodeIgniter\Model;

class SaleDetailModel extends Model {
  protected $table = 'sale_detail';
  protected $primaryKey = 'id';
  protected $useAutoIncrement = true;
  protected $returnType = 'array';
  protected $useSoftDeletes = false;
  protected bool $allowEmptyInserts = false;
  protected $allowedFields = ['id_sale', 'sneaker_id', 'quantity', 'price'];

  public function add_sale_detail(array $data): bool|int|string {
    return $this->insert($data);
  }

  public function get_one_detail(string $id_sale) {
    $query = "SELECT 
    header_sale.id_sale,
    header_sale.date,
    header_sale.total,
    sale_detail.sneaker_id,
    sale_detail.quantity,
    sale_detail.price,
    sneakers.model,
    sneakers.brand
    FROM sale_detail
    INNER JOIN header_sale ON sale_detail.id_sale = header_sale.id_sale
    INNER JOIN sneakers ON sale_detail.sneaker_id = sneakers.id_sneaker
    WHERE header_sale.id_sale = ?";
    $result = $this->db->query($query, $id_sale);
    if ($result->getNumRows() > 0) {
      $rows = $result->getResultArray();
      $sale = [
        'id_sale' => $rows[0]['id_sale'],
        'date' => $rows[0]['date'],
        'total' => $rows[0]['total'],
      ];
      foreach ($rows as $row) {
        $sale['detail'][] = [
          'brand' => $row['brand'],
          'model' => $row['model'],
          'quantity' => $row['quantity'],
          'price' => $row['price']
        ];
      }
      return $sale;
    }
    return null;
  }
}
