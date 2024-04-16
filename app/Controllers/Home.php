<?php

namespace App\Controllers;

class Home extends BaseController {
  // public function home(): string {
  //   $title = ['title' => 'Inicio | Sneakers Store'];
  //   return view('Head', $title).view('Nav').view('PageHome').view('Footer').view('Script');
  // }
  public function home(): string {
    return view('pages/Home');
  }

  // public function aboutUs(): string {
  //   $title = ['title' => 'Sobre nosotros | Sneakers Store'];
  //   return view('Head', $title).view('Nav').view('PageAboutUs').view('Footer').view('Script');
  // }
  public function aboutUs(): string {
    return view('pages/AboutUs');
  }

  // public function payments(): string {
  //   $title = ['title' => 'Metodos de pago | Sneakers Store'];
  //   return view('Head', $title).view('Nav').view('PagePayments').view('Footer').view('Script');
  // }
  public function payments(): string {
    return view('pages/Payments');
  }

  // public function contacts(): string {
  //   $title = ['title' => 'Contactanos | Sneakers Store'];
  //   return view('Head', $title).view('Nav').view('PageContact').view('Footer').view('Script');
  // }
  public function contacts(): string {
    return view('pages/Contact');
  }

  // public function products(): string {
  //   $title = ['title' => 'Catalogo | Sneakers Store'];
  //   return view('Head', $title).view('Nav').view('PageProducts').view('Footer').view('Script');
  // }
  public function products(): string {
    return view('pages/Products');
  }

  public function product($id) {
    $rutaJson = APPPATH . 'Json/products.json';
    $jsonData = file_get_contents($rutaJson);
    $products = json_decode($jsonData, true);

    if (count($products['allProducts']) != 0) {
      foreach ($products['allProducts'] as $product) {
        if ($product["id"] == $id) {
          return view("pages/Product", $product);
        }
      }
      return view("errors/html/error_404", ['message' => "Error producto no encontrado"]);
    }
  }

  public function termsConditions() {
    return view("pages/termsConditions");
  }

  public function privacyPolicy() {
    return view("pages/PrivacyPolicy");
  }
}