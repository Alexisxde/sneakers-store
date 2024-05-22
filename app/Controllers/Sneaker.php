<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\SneakerModel;
use App\Models\SizesModel;

class Sneaker extends BaseController {
  private SneakerModel $modelSneaker;
  private SizesModel $modelSizes;

  public function __construct() {
    $this->modelSneaker = new SneakerModel();
    $this->modelSizes = new SizesModel();
  }

  public function all_sneakers(): string {
    $products = $this->modelSneaker->all_products();
    $data = ["products" => $products];
    return view('pages/Products', $data);
  }

  public function one_sneaker(string $id): string {
    $product = $this->modelSneaker->find($id); //* SELECT * FROM productos WHERE id = $id;
    $sizes = $this->modelSizes->where('id_sneaker', $id)->findAll(); //* SELECT * FROM sizes WHERE id_sneaker = $id;

    if ($product == null) {
      return view('errors/html/error_404', ["message" => "Producto no encontrado"]);
    }

    $data = [
      "product" => $product,
      "sizes" => $sizes
    ];
    return view('pages/Product', $data);
  }

  public function form_add_product(): string {
    return view("pages/FormProduct");
  }

  public function featured(): ?array {
    //* SELECT * FROM productos WHERE stars > 1 AND discount > 10 LIMIT 5;
    $featured = $this->modelSneaker
      ->where('stars >', 3)
      ->where('discount >', 0)
      ->limit(5)
      ->findAll();
    return $featured;
  }
}
