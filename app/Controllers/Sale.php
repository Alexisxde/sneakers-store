<?php

namespace App\Controllers;

use App\Models\SneakerModel;
use App\Models\HeaderSaleModel;
use App\Models\SaleDetailModel;
use App\Models\StockModel;
use CodeIgniter\HTTP\RedirectResponse;

class Sale extends BaseController {
  private HeaderSaleModel $modelHeaderSale;
  private SaleDetailModel $modelSaleDetail;
  private StockModel $modelStock;
  private $cart;

  public function __construct() {
    $this->modelHeaderSale = new HeaderSaleModel();
    $this->modelSaleDetail = new SaleDetailModel();
    $this->modelStock = new StockModel();
    $this->cart = \Config\Services::cart();
  }

  public function shop_user(): RedirectResponse {
    $total = 0;
    $id_sale = uniqid();
    foreach ($this->cart->contents() as $sneaker) {
      extract($sneaker);
      $total += number_format($price, 3, '.', '');
      $stock = $this->modelStock->one_stock($id, $options['size']);
      if ($stock['quantity'] <= 0) {
        return redirect()->back()->with('msg', [
          'type' => 'error',
          'body' => "$name Talle " . $options['size'] . " sin stock."
        ]);
      }
    }
    $this->modelHeaderSale->add_header_sale([
      'id_sale' => $id_sale,
      'id_user' => session('id_user'),
      'total' => number_format($total, 3, '.', '')
    ]);
    foreach ($this->cart->contents() as $sneaker) {
      extract($sneaker);
      $this->modelSaleDetail->add_sale_detail([
        'id_sale' => $id_sale,
        'sneaker_id' => $id,
        'quantity' => $qty,
        'price' => number_format($price, 3, '.', '')
      ]);
      $stock = $this->modelStock->one_stock($id, $options['size']);
      $quantity = $stock['quantity'] - $qty;
      $this->modelStock->update_stock($id, $options['size'], $quantity);
    }
    $this->cart->destroy();
    return redirect()->to(base_url())->with('msg', [
      'type' => 'success',
      'body' => "Compra realizada con éxito!"
    ]);
  }

  public function sales(): string {
    $header_sale = $this->modelHeaderSale->all_header_sale_user();
    $data = [
      "header_sale" => $header_sale
    ];
    return view('pages/SalesUser', $data);
  }

  public function invoice(string $id_sale): string {
    $details = $this->modelSaleDetail->get_one_detail($id_sale);
    $data = [
      "details" => $details
    ];
    dd($details);
    return view('pages/SalesUser', $data);
  }
}
