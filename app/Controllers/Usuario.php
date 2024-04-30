<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Usuario extends BaseController {
  # $model->findAll() -> SELECT * FROM usuarios
  # $model->find($id) -> SELECT * FROM usuarios WHERE id = 1 LIMIT 1
  private $model;

  public function __construct() {
    $this->model = new UsuarioModel();
  }

  public function all_users() {
    $users = $this->model->findAll();
    $data = [
      "users" => $users
    ];
    // Luego puedes pasar los datos a tu vista
    return view('test', $data);
  }

  // public function one_product($id) {
  //   $product = $this->model->find($id);
  //   $data = [
  //     "product" => $product
  //   ];
  //   return view('test', $data);
  // }
}
