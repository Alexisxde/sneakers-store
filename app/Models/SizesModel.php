<?php

namespace App\Models;

use CodeIgniter\Model;

class SizesModel extends Model
{
  protected $table = 'sizes';
  protected $primaryKey = 'id';
  protected $useAutoIncrement = true;
  protected $returnType = 'array';
  protected $useSoftDeletes = false;
  protected bool $allowEmptyInserts = false;
  protected $allowedFields = [
    'id',
    'product_id',
    'size',
    'stock',
  ];
}
