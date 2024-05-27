<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\RedirectResponse;

class User extends BaseController {
  private UserModel $model;
  protected $helpers = ['form', 'rules'];

  public function __construct() {
    $this->model = new UserModel();
  }

  public function login(): string|RedirectResponse {
    if (!isset($this->session->username) || $this->session->rol === 'admin') {
      return view("pages/Login");
    }
    return redirect()->to(base_url());
  }

  public function register(): string|RedirectResponse {
    if (!isset($this->session->username) || $this->session->rol === 'admin') {
      return view("pages/Register");
    }
    return redirect()->to(base_url());
  }

  //! DELETE VIEW
  public function all_users(): string|RedirectResponse {
    $users = $this->model->all_users();
    $data = ["users" => $users];
    return view('pages/TableUsers', $data);
  }

  public function logout(): string|RedirectResponse {
    if (!isset($this->session->username)) {
      return redirect()->to(base_url());
    }
    session()->destroy();
    return redirect()->to('/login');
  }

  public function login_user(): string|RedirectResponse {
    $validationRules = getValidationRules('login');
    extract($this->request->getPost(['username', 'password']));
    if (!$this->validate($validationRules)) {
      return redirect()->back()->withInput();
    }
    if (!$this->model->validate_password($username, $password)) {
      session()->setFlashdata('error', 'La contraseña es incorrecta.');
      return redirect()->back()->withInput();
    }
    $user = $this->model->user_data($username);
    $this->session->set($user);
    return redirect()->to(base_url());
  }

  public function create_user(): string|RedirectResponse {
    $validationRules = getValidationRules('register');
    if (!$this->validate($validationRules)) {
      return redirect()->back()->withInput();
    }
    extract($this->request->getPost(['username', 'password', 'name', 'email', 'surname']));
    $data = [
      "id_user" => uniqid(),
      "username" => strtolower($username),
      "name" => $name,
      "email" => $email,
      "surname" => $surname,
      "password" => password_hash($password, PASSWORD_BCRYPT),
      "token" => bin2hex(random_bytes(32))
    ];
    $this->model->add_user($data);
    return redirect()->to(base_url('login'));
  }
}
