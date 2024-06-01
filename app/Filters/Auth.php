<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use \CodeIgniter\Exceptions\PageNotFoundException;

class Auth implements FilterInterface {
  public function before(RequestInterface $req, $args = null) {
    if (!session('logged_in')) {
      return redirect()->back()->with('msg', [
        'type' => 'warning',
        'body' => "Por favor inicie sesión o creese una cuenta para continuar."
      ]);
    }
  }

  public function after(RequestInterface $req, ResponseInterface $res, $args = null) {}
}
