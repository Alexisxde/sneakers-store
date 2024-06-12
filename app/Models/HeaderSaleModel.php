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
  protected $allowedFields = ['id_sale', 'date', 'id_user', 'total'];

  public function add_header_sale(array $data): bool|int|string {
    return $this->insert($data);
  }

  public function all_header_sale_user() {
    $query = "SELECT id_user, id_sale, date, total FROM header_sale";
    $result = $this->db->query($query);
    return $result->getNumRows() > 0 ? $result->getResultArray() : null;
  }
}
