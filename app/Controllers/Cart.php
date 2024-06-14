<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RedirectResponse;
use App\Models\SneakerModel;
use App\Models\StockModel;

class Cart extends BaseController {
  private SneakerModel $modelSneaker;
  private StockModel $modelStock;
  private $cart;
  protected $helpers = ['form', 'rules'];

  public function __construct() {
    $this->modelSneaker = new SneakerModel();
    $this->modelStock = new StockModel();
    $this->cart = \Config\Services::cart();
  }

  public function add_cart(): RedirectResponse {
    $validationRules = getValidationRules('add_cart');
    if (!$this->validate($validationRules)) {
      return redirect()->back()->with('msg', [
        'type' => 'error',
        'body' => "Ocurrió algun error por favor intentelo más tarde."
      ]);
    }
    extract($this->request->getPost(['id_sneaker', 'size']));
    $sneaker = $this->modelSneaker->one_sneaker($id_sneaker);
    $stock = $this->modelStock->one_stock($id_sneaker, $size);
    if ($stock === null) {
      return redirect()->back()->with('msg', [
        'type' => 'error',
        'body' => "Ocurrió algun error por favor intentelo más tarde."
      ]);
    }
    extract($sneaker);
    extract($stock);
    $this->cart->insert([
      'id'      => $id_sneaker,
      'qty'     => 1,
      'price'   => number_format($price * (1 - $discount / 100), 0, ',', '.'),
      'name'    => "$brand  $model",
      'options' => [
        'size' => $size,
        'priceprev' => number_format($price, 0, ',', '.'),
        'price' => number_format($price * (1 - $discount / 100), 0, ',', '.'),
        'discount' => $discount,
        'img' => $img
      ]
    ]);
    return redirect()->back()->with('msg', [
      'type' => 'success',
      'body' => "$brand  $model añadido al carrito."
    ]);
  }

  public function delete_sneaker_cart(): RedirectResponse {
    extract($this->request->getPost(['rowid']));
    $this->cart->remove($rowid);
    return redirect()->back();
  }

  public function destroy_sneakers_cart(): RedirectResponse {
    $this->cart->destroy();
    return redirect()->back()->with('msg', [
      'type' => 'success',
      'body' => 'Se vació el carrito de compras.'
    ]);
  }

  public function checkout() {
    return view('pages/Checkout');
  }
}
