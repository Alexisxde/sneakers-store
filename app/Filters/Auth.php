<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use \CodeIgniter\Exceptions\PageNotFoundException;

class Auth implements FilterInterface {
  public function before(RequestInterface $req, $args = null) {
    if (!session()->get('logged_in')) {
      throw new PageNotFoundException("Error permiso denegado");
    }
  }

  public function after(RequestInterface $req, ResponseInterface $res, $args = null) {}
}
