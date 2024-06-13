<?php

namespace App\Controllers;

use App\Models\SneakerModel;
use App\Models\HeaderSaleModel;
use App\Models\SaleDetailModel;
use App\Models\StockModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\RedirectResponse;

class Sale extends BaseController {
  private SneakerModel $modelSneaker;
  private HeaderSaleModel $modelHeaderSale;
  private SaleDetailModel $modelSaleDetail;
  private StockModel $modelStock;
  private $cart;

  public function __construct() {
    $this->modelSneaker = new SneakerModel();
    $this->modelHeaderSale = new HeaderSaleModel();
    $this->modelSaleDetail = new SaleDetailModel();
    $this->modelStock = new StockModel();
    $this->cart = \Config\Services::cart();
  }

  public function shop_user(): RedirectResponse {
    if (count($this->cart->contents()) == 0) {
      return redirect()->to(base_url())->with('msg', [
        'type' => 'error',
        'body' => "Ocurrió un error con la compra, intentelo de nuevo por favor."
      ]);
    }
    extract($this->request->getPost(['payment']));
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
      'total' => number_format($total, 3, '.', ''),
      'payment' => $payment
    ]);
    foreach ($this->cart->contents() as $sneaker) {
      extract($sneaker);
      $this->modelSaleDetail->add_sale_detail([
        'id_sale' => $id_sale,
        'sneaker_id' => $id,
        'size' => $options['size'],
        'quantity' => $qty,
        'price' => number_format($price, 3, '.', ''),
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
    $header_sale = $this->modelHeaderSale->header_sale_user(session('id_user'));
    $data = [
      "header_sale" => $header_sale
    ];
    return view('pages/SalesUser', $data);
  }

  public function sales_admin(): string {
    $all_headers_sales = $this->modelHeaderSale->all_header_sale_user();
    $data = [
      "all_headers_sales" => $all_headers_sales
    ];
    return view('pages/SalesUserAdmin', $data);
  }

  public function invoice(string $id_sale): string {
    $details = $this->modelHeaderSale->get_all_detail($id_sale);
    if ($details === null) {
      throw new PageNotFoundException("Factura no encontrada.");
    }
    $data = ["details" => $details];
    return view('pages/Invoice', $data);
  }
}
