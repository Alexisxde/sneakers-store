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
    $data = ['users' => $this->model->all_users(session('id_user'))];
    return view('pages/TableUsers', $data);
  }

  public function logout(): RedirectResponse {
    session()->destroy();
    return redirect()->to(base_url('login'))->with('msg', [
      'type' => 'success',
      'body' => "Vuelva pronto!"
    ]);
  }

  public function login_user(): RedirectResponse {
    $validationRules = getValidationRules('login');
    extract($this->request->getPost(['username', 'password']));
    if (!$this->validate($validationRules)) {
      return redirect()->back()->withInput();
    }
    if (!$this->model->validate_password($username, $password)) {
      return redirect()->back()->withInput()->with('error', 'El usuario y/o la contraseña es incorrecta.');
    }
    $user = $this->model->user_data($username);
    if ($user['is_active'] == 0) {
      return redirect()->to(base_url('login'))->with('msg', [
        'type' => 'error',
        'body' => ucfirst(strtolower($user['username'])) . " dado de baja. Contactesé con un administrador."
      ]);
    }
    $this->session->set($user);
    $this->session->set(["logged_in" => true]);
    return redirect()->to(base_url())->with('msg', [
      'type' => 'success',
      'body' => "Bienvenido " . ucfirst(strtolower($user['username'])) . "!"
    ]);
  }

  public function create_user(): RedirectResponse {
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
    ];
    $this->model->add_user($data);
    return redirect()->to(base_url('login'))->with('msg', [
      'type' => 'success',
      'body' => "Usuario creado correctamente. Por favor inicie sesión."
    ]);
  }

  public function settings(): string {
    return view("pages/UserSettings");
  }

  public function user_settings(): RedirectResponse {
    $validationRules = getValidationRules('settings');
    if (!$this->validate($validationRules)) {
      return redirect()->back()->withInput();
    }
    extract($this->request->getPost(['id_user', 'username', 'newpassword', 'password']));
    if (!$this->model->validate_password($username, $password)) {
      return redirect()->back()->withInput()->with('error', 'La contraseña es incorrecta.');
    }
    $data = ['password' => password_hash($newpassword, PASSWORD_BCRYPT)];
    $this->model->edit_user($id_user, $data);
    $this->logout();
    return redirect()->to(base_url())->with('msg', [
      'type' => 'success',
      'body' => "Usuario actualizado correctamente. Por favor vuelva a iniciar sesión."
    ]);
  }

  public function user_delete(): RedirectResponse {
    if (session('rol') == 'admin') {
      return redirect()->back()->with('msg', [
        "type" => "error",
        "body" => "Usuario administrador no puede eliminar su cuenta."
      ]);
    }
    $this->status_user(session('id_user'));
    $this->logout();
    return redirect()->to(base_url('login'));
  }

  public function status_user(string $id_user) {
    $user_data = $this->model->user_data_id($id_user);
    $is_active = $user_data['is_active'];
    $this->model->edit_user($id_user, [
      'is_active' => $is_active == "0" ? "1" : "0"
    ]);
    return redirect()->back();
  }

  public function rol_user(string $id_user) {
    $user_data = $this->model->user_data_id($id_user);
    $rol = $user_data['rol'];
    $this->model->edit_user($id_user, [
      'rol' => $rol == "admin" ? "user" : "admin"
    ]);
    return redirect()->back();
  }
}
