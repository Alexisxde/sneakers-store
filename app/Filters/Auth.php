<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use \CodeIgniter\Exceptions\PageNotFoundException;

class Auth implements FilterInterface {
  public function before(RequestInterface $req, $args = null) {
    if (!isset(session()->username) || session()->rol !== 'admin') {
      throw new PageNotFoundException("Error, permiso denegado");
    }
  }

  public function after(RequestInterface $req, ResponseInterface $res, $args = null) {
  }
}
