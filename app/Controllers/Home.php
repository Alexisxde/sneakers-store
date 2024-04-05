<?php

namespace App\Controllers;

class Home extends BaseController {
  public function home() {
    echo view('Home');
  }

  public function aboutUs() {
    echo view('AboutUs');
  }
}
