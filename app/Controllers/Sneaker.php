<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\SneakerModel;
use App\Models\StockModel;

use CodeIgniter\HTTP\RedirectResponse;
use \CodeIgniter\Exceptions\PageNotFoundException;

class Sneaker extends BaseController {
  private SneakerModel $modelSneaker;
  private StockModel $modelStock;
  protected $helpers = ["form", "rules"];

  public function __construct() {
    $this->modelSneaker = new SneakerModel();
    $this->modelStock = new StockModel();
  }

  public function all_sneakers(): string {
    $search = $this->request->getGet('search') ?? "all";
    $items_page = 10;
    $data = [];
    if (session('rol') === 'admin') {
      if ($search !== "all") {
        $data['products'] = $this->modelSneaker
          ->like('brand', $search, 'both')
          ->orLike('model', $search, 'both')
          ->orderBy('is_active', "ASC")
          ->paginate($items_page);
      } else {
        $data['products'] = $this->modelSneaker->orderBy('is_active', "ASC")->paginate($items_page);
      }
    } else {
      if ($search !== "all") {
        $data['products'] = $this->modelSneaker
          ->where('is_active =', 1)
          ->like('brand', $search, 'both')
          ->orLike('model', $search, 'both')
          ->paginate($items_page);
      } else {
        $data['products'] = $this->modelSneaker->where('is_active =', 1)->paginate($items_page);
      }
    }
    $data['pager'] = $this->modelSneaker->pager;
    return view('pages/Products', $data);
  }

  public function one_sneaker(string $id): string {
    $sneaker = $this->modelSneaker->one_sneaker_join($id);
    $data = ["sneaker" => $sneaker];
    return view('pages/Product', $data);
  }

  public function form_add_sneaker(): string {
    return view("pages/FormAddSneaker");
  }

  public function form_edit_sneaker(string $id_sneaker): string {
    $sneaker = $this->modelSneaker->one_sneaker($id_sneaker);
    $stocks = $this->modelStock->all_stock($id_sneaker);
    return view("pages/FormEditSneaker", ["sneaker" => $sneaker, "stocks" => $stocks]);
  }

  public function edit_sneaker(): RedirectResponse {
    $validationRules = getValidationRules('edit_sneaker');
    if (!$this->validate($validationRules)) {
      return redirect()->back()->withInput();
    }
    extract($this->request->getPost([
      'sneaker_id',
      'sneaker_brand',
      'sneaker_model',
      'sneaker_price',
      'sneaker_discount',
      'sneaker_stars',
      'sneaker_description',
      'sneaker_active',
      'new_size',
      'new_stock'
    ]));
    $sneaker_img = $this->request->getFile('sneaker_img');
    $data = [
      'brand' => $sneaker_brand,
      'price' => $sneaker_price,
      'discount' => $sneaker_discount,
      'model' => $sneaker_model,
      'stars' => $sneaker_stars,
      'description' => $sneaker_description,
      'is_active' => $sneaker_active == 'on' ? '1' : '0',
    ];
    if ($sneaker_img->getClientName() === "") {
      $this->modelSneaker->edit_sneaker($sneaker_id, $data);
      $all_sizes = $this->modelStock->all_stock($sneaker_id);
      foreach ($all_sizes as ['size' => $size]) {
        $this->modelStock->update_stock(
          $sneaker_id,
          (int) $this->request->getPost("size-$size"),
          (int) $this->request->getPost("stock-$size")
        );
      }
      if ($new_size) {
        $this->modelStock->add_stock($sneaker_id, (int) $new_size, (int) $new_stock);
      }
      return redirect()->to(base_url('sneakers'))->with('msg', [
        'type' => 'success',
        'body' => "$sneaker_brand $sneaker_model guardado correctamente..."
      ]);
    }
    if (!$sneaker_img->isValid()) {
      return redirect()->to(base_url("edit_sneaker/$sneaker_id"))->with('msg', [
        'type' => 'error',
        'body' => $sneaker_img->getErrorString()
      ]);
    }
    if ($sneaker_img->hasMoved()) {
      return redirect()->to(base_url("edit_sneaker/$sneaker_id"))->with('msg', [
        'type' => 'error',
        'body' => "La imagen se movió, intentelo de nuevo."
      ]);
    }
    $path = ROOTPATH . '/assets/img/sneakers';
    $originalName = $sneaker_img->getClientName();
    sscanf($originalName, '%[^.].%s', $name, $extension);
    $nameFile = $sneaker_id . "." . $extension;
    $sneaker_img->move($path, $nameFile, true);
    $data['img'] = $nameFile;
    $this->modelSneaker->edit_sneaker($sneaker_id, $data);
    return redirect()->to(base_url('sneakers'))->with('msg', [
      'type' => 'success',
      'body' => "$sneaker_brand $sneaker_model guardado correctamente..."
    ]);
  }

  public function add_sneaker(): RedirectResponse {
    $validationRules = getValidationRules('add_sneaker');
    if (!$this->validate($validationRules)) {
      return redirect()->back()->withInput();
    }
    $id_sneaker = uniqid();
    extract($this->request->getPost([
      'sneaker_brand',
      'sneaker_model',
      'sneaker_price_purchase',
      'sneaker_price',
      'sneaker_discount',
      'sneaker_stars',
      'sneaker_description',
      'sneaker_size',
      'sneaker_stock'
    ]));
    $sneaker_img = $this->request->getFile('sneaker_img');
    if (!$sneaker_img->isValid()) {
      return redirect()->back()->with('msg', [
        'type' => 'error',
        'body' => $sneaker_img->getErrorString()
      ]);
    }
    if ($sneaker_img->hasMoved()) {
      return redirect()->back()->with('msg', [
        'type' => 'error',
        'body' => "La imagen se movió y ocurrió un error."
      ]);
    }
    $path = ROOTPATH . '/assets/img/sneakers';
    $originalName = $sneaker_img->getClientName();
    sscanf($originalName, '%[^.].%s', $name, $extension);
    $nameFile = $id_sneaker . '.' . $extension;
    $sneaker_img->move($path, $nameFile);
    $data = [
      'id_sneaker' => $id_sneaker,
      'brand' => $sneaker_brand,
      'price_purchase' => $sneaker_price_purchase,
      'price' => $sneaker_price,
      'discount' => $sneaker_discount,
      'model' => $sneaker_model,
      'stars' => $sneaker_stars,
      'description' => $sneaker_description,
      'img' => $nameFile
    ];
    $this->modelSneaker->add_sneaker($data);
    $this->modelStock->add_stock($id_sneaker, (int) $sneaker_size, (int) $sneaker_stock);
    return redirect()->back()->with('msg', [
      'type' => 'success',
      'body' => "$sneaker_brand $sneaker_model subido correctamente..."
    ]);
  }

  public function status(string $id): RedirectResponse {
    $sneaker = $this->modelSneaker->one_sneaker($id);
    if ($sneaker !== null) {
      extract($sneaker);
      $is_active = $sneaker["is_active"] == 0 ? 1 : 0;
      $this->modelSneaker->edit_sneaker($id, ['is_active' => $is_active]);
      return redirect()->back()->with("msg", [
        "type" => $is_active == 0 ? "error" : "success",
        "body" => $is_active == 0 ? "$brand $model Desactivado" : "$brand $model Activado",
      ]);
    }
    throw new PageNotFoundException("Sneaker no encontrado.");
  }

  public function featured(): ?array {
    $featured = $this->modelSneaker->featured(2, 10);
    return $featured;
  }
}
