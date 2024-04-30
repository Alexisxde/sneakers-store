<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model
{
  protected $table = 'productos';
  protected $primaryKey = 'id';
  protected $useAutoIncrement = true;
  protected $returnType = 'array';
  protected $useSoftDeletes = false;
  protected bool $allowEmptyInserts = false;
  protected $allowedFields = [
    'id',
    'title',
    'img',
    'price',
    'discount',
    'stars',
    'description',
  ];
}
