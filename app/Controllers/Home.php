<?php

namespace App\Controllers;

class Home extends BaseController {
  public function home() {
    echo view('Nav');
    echo view('Carousel');
  }
}
