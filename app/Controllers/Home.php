<?php

namespace App\Controllers;

class Home extends BaseController {
  public function home() {
    echo view('PageHome');
  }

  public function aboutUs() {
    echo view('PageAboutUs');
  }

  public function payments() {
    echo view("PagePayments.php");
  }

  public function contacts() {
    echo view("PageContact.php");
  }
}
