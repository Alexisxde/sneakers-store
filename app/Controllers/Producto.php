<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\ProductoModel;
use App\Models\SizesModel;

class Producto extends BaseController {
  private ProductoModel $modelProducto;
  private SizesModel $modelSizes;

  public function __construct() {
    $this->modelProducto = new ProductoModel();
    $this->modelSizes = new SizesModel();
  }

  public function all_products(): string {
    $products = $this->modelProducto->findAll(); //* SELECT * FROM productos;
    $data = ["products" => $products];
    return view('pages/Products', $data);
  }

  public function one_products(int $id): string {
    $product = $this->modelProducto->find($id); //* SELECT * FROM productos WHERE id = $id;
    $sizes = $this->modelSizes->where('product_id', $id)->findAll(); //* SELECT * FROM sizes WHERE product_id = $id;

    if ($product == null) {
      return view('errors/html/error_404', ["message" => "Producto no encontrado"]);
    }

    $data = [
      "product" => $product,
      "sizes" => $sizes
    ];
    return view('pages/Product', $data);
  }

  public function featured(): ?array {
    //* SELECT * FROM productos WHERE stars > 1 AND discount > 10 LIMIT 5;
    $featured = $this->modelProducto
      ->where('stars >', 3)
      ->where('discount >', 10)
      ->limit(5)
      ->findAll();
    return $featured;
  }
}
