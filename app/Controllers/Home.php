<?php

namespace App\Controllers;

class Home extends BaseController {
  public function home() {
    echo view('HomePage');
  }

  public function aboutUs() {
    echo view('AboutUsPage');
  }

  public function payments() {
    echo view("PaymentsPage.php");
  }
}
