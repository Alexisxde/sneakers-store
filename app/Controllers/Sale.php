<?php

namespace App\Controllers;

use App\Models\SneakerModel;
use App\Models\SaleModel;
use App\Models\StockModel;
use CodeIgniter\HTTP\RedirectResponse;

class Sale extends BaseController {
  private SneakerModel $modelSneaker;
  private SaleModel $modelSale;
  private StockModel $modelStock;
  private $cart;

  public function __construct() {
    $this->modelSneaker = new SneakerModel();
    $this->modelSale = new SaleModel();
    $this->modelStock = new StockModel();
    $this->cart = \Config\Services::cart();
  }

  public function shop_user(): RedirectResponse {
    $id_sale = uniqid();
    foreach ($this->cart->contents() as $sneaker) {
      extract($sneaker);
      $data = [
        'id_sale' => $id_sale,
        'id_sneaker' => $id,
        'size' => $options['size'],
        'quantity' => $qty,
        'price' => number_format($price, 3, '.', ''),
        'id_user' => session('id_user')
      ];
      $this->modelSale->sale_sneaker($data);
      [$stock] = $this->modelStock->one_stock($id, $options['size']);
      $quantity = $stock['quantity'] - $qty;
      $stock = $this->modelStock->update_stock($id, $options['size'], $quantity);
    }
    $this->cart->destroy();
    return redirect()->to(base_url())->with('msg', [
      'type' => 'success',
      'body' => "Compra realizada con exito!"
    ]);
  }

  public function sales(): string {
    $sneakers = [];
    $sales = $this->modelSale->sale_user(session('id_user'));
    if ($sales !== null) {
      foreach ($sales as $i => ['id_sneaker' => $id_sneaker]) {
        [$sneaker] = $this->modelSneaker->one_sneaker($id_sneaker);
        $sneakers[$i] = $sneaker;
      }
    }
    return view('pages/SalesUser', [
      'sneakers' => $sneakers,
      'sales' => $sales
    ]);
  }
}
