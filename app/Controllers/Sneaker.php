<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\SneakerModel;
use App\Models\SizesModel;

use CodeIgniter\HTTP\RedirectResponse;
use \CodeIgniter\Exceptions\PageNotFoundException;

class Sneaker extends BaseController {
  private SneakerModel $modelSneaker;
  private SizesModel $modelSizes;
  protected $helpers = ["form", "rules"];

  public function __construct() {
    $this->modelSneaker = new SneakerModel();
    $this->modelSizes = new SizesModel();
  }

  public function all_sneakers(): string {
    $products = $this->modelSneaker->all_sneakers();
    $data = ["products" => $products];
    return view('pages/Products', $data);
  }

  public function one_sneaker(string $id): string {
    $sneaker = $this->modelSneaker->find($id); //* SELECT * FROM productos WHERE id = $id;
    $sizes = $this->modelSizes->where('id_sneaker', $id)->findAll(); //* SELECT * FROM sizes WHERE id_sneaker = $id;

    if ($sneaker == null) {
      throw new PageNotFoundException("Sneaker no encontrado.");
    }

    $data = [
      "product" => $sneaker,
      "sizes" => $sizes
    ];

    return view('pages/Product', $data);
  }

  public function form_add_sneaker(): string {
    return view("pages/AddSneaker");
  }

  public function add_sneaker(): RedirectResponse {
    $validationRules = getValidationRules('add_sneaker');
    if (!$this->validate($validationRules)) {
      return redirect()->back()->withInput();
    }
    extract($this->request->getPost(
      [
        'sneaker_brand',
        'sneaker_model',
        'sneaker_price',
        'sneaker_discount',
        'sneaker_stars',
        'sneaker_description',
        'sneaker_active',
        'sneaker_img'
      ]
    ));
    $data = [
      'id_sneaker' => uniqid(),
      'brand' => $sneaker_brand,
      'price' => $sneaker_price,
      'discount' => $sneaker_discount,
      'stars' => $sneaker_stars,
      'description' => $sneaker_description,
      'active' => $sneaker_active,
      'img' => $sneaker_img
    ];
    print_r($data);
    exit;
  }

  public function status(string $id): string|RedirectResponse {
    if (isset($this->session->username) && $this->session->rol === 'admin') {
      $sneaker = $this->modelSneaker->one_sneaker($id);
      if ($sneaker !== null) {
        $sneaker[0]["is_active"] = ($sneaker[0]["is_active"] == 0) ? 1 : 0;
        $this->modelSneaker->edit_sneaker($id, $sneaker[0]);
        return view("pages/ActiveSneaker", $sneaker[0]);
      }
      throw new PageNotFoundException("Sneaker no encontrado.");
    }
    return redirect()->to(base_url());
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
