<?php

namespace App\Controllers;

class Home extends BaseController {
  public function home(): string {
    return view('pages/Home');
  }

  public function aboutUs(): string {
    return view('pages/AboutUs');
  }

  public function contacts(): string {
    return view('pages/Contact');
  }

  public function termsConditions(): string {
    return view("pages/termsConditions");
  }

  public function privacyPolicy(): string {
    return view("pages/PrivacyPolicy");
  }

  public function commercialization(): string {
    return view("pages/Commercialization");
  }
}