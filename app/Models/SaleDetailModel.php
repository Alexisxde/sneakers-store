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
  protected $allowedFields = ['id_sale', 'sneaker_id', 'size', 'quantity', 'price'];

  public function add_sale_detail(array $data): bool|int|string {
    return $this->insert($data);
  }
}
