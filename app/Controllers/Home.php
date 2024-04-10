<?php

namespace App\Controllers;

class Home extends BaseController {
  public function home(): string {
    return view('PageHome.php');
  }

  public function aboutUs(): string {
    return view('PageAboutUs.php');
  }

  public function payments(): string {
    return view("PagePayments.php");
  }

  public function contacts(): string {
    return view("PageContact.php");
  }

  public function products(): string {
    return view("PageProducts.php");
  }
}
