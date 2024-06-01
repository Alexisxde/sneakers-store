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
    if (session('logged_in')) {
      return redirect()->to(base_url())->with('msg', [
        'type' => 'error',
        'body' => "Por favor cierre sesión, para logearse con otra cuenta."
      ]);
    }
    return view('pages/Login');
  }

  public function register(): string|RedirectResponse {
    if (session('logged_in') && session('rol') === 'user') {
      return redirect()->to(base_url())->with('msg', [
        'type' => 'error',
        'body' => "Por favor cierre sesión, para crear otra cuenta."
      ]);
    }
    return view('pages/Register');
  }

  public function all_users(): string {
    $items_page = 10;
    $data = [
      'users' => $this->model->paginate($items_page),
      'pager' => $this->model->pager,
    ];
    return view('pages/TableUsers', $data);
  }

  public function logout(): string|RedirectResponse {
    if (!session('logged_in')) {
      return redirect()->to(base_url())->with('msg', [
        'type' => 'error',
        'body' => "Permiso denegado"
      ]);
    }
    session()->destroy();
    return redirect()->to(base_url('login'));
  }

  public function login_user(): string|RedirectResponse {
    $validationRules = getValidationRules('login');
    extract($this->request->getPost(['username', 'password']));
    if (!$this->validate($validationRules)) {
      return redirect()->back()->withInput();
    }
    if (!$this->model->validate_password($username, $password)) {
      return redirect()->back()->withInput()->with('error', 'La contraseña es incorrecta.');
    }
    $user = $this->model->user_data($username);
    $this->session->set($user);
    $this->session->set(["logged_in" => true]);
    return redirect()->to(base_url())->with('msg', [
      'type' => 'success',
      'body' => "Bienvenido " . ucfirst(strtolower($user['username'])) . "!"
    ]);
  }

  public function create_user(): string|RedirectResponse {
    $validationRules = getValidationRules('register');
    if (!$this->validate($validationRules)) {
      return redirect()->back()->withInput();
    }
    extract($this->request->getPost(['username', 'password', 'name', 'email', 'surname']));
    $data = [
      'id_user' => uniqid(),
      'username' => strtolower($username),
      'name' => $name,
      'email' => $email,
      'surname' => $surname,
      'password' => password_hash($password, PASSWORD_BCRYPT),
      'token' => bin2hex(random_bytes(32))
    ];
    $this->model->add_user($data);
    return redirect()->to(base_url('login'))->with('msg', [
      'type' => 'success',
      'body' => "Usuario creado correctamente. Por favor inicie sesión."
    ]);
  }
}
