<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\RedirectResponse;

class User extends BaseController {
  private UserModel $model;

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
    if (isset($this->session->username) && $this->session->rol === 'admin') {
      $users = $this->model->findAll();
      $data = [
        "users" => $users
      ];
      return view('test', $data);
    }
    return redirect()->to(base_url());
  }

  public function logout(): string|RedirectResponse {
    if (!isset($this->session->username)) {
      return redirect()->to(base_url());
    }
    session()->destroy();
    return redirect()->to('/login');
  }

  public function login_user(): string|RedirectResponse {
    if (!isset($this->session->username) || $this->session->rol === 'admin') {
      extract($this->request->getPost(['username', 'password']));
      // ! NO ESTA ANDADO
      if ($this->model->validar_credenciales($username, $password)) {
        // if (true) {
        $user = $this->model->obtener_usuario($username);
        $this->session->set($user);
        return redirect()->to(base_url());
      }
      return view("pages/Login", ['error' => 'Nombre de usuario o contraseña incorrecta. Intentelo de nuevo']);
    }
    return redirect()->to(base_url());
  }


  public function create_user(): string|RedirectResponse {
    if (!isset($this->session->username) || $this->session->rol === 'admin') {
      extract($this->request->getPost(['username', 'password', 'name', 'email', 'surname']));
      if ($this->model->username_exist($username)) {
        $data['error_username'] = "El nombre de usuario ya está en uso. Por favor, elige otro nombre de usuario.";
      } else if ($this->model->email_exist($email)) {
        $data['error_email'] = "El correo de electronico ya está en uso. Por favor, elige otro nombre de usuario.";
      } else {
        $data = [
          "id_user" => uniqid(),
          "username" => strtolower($username),
          "name" => $name,
          "email" => $email,
          "surname" => $surname,
          "password" => password_hash($password, PASSWORD_BCRYPT),
          "token" => bin2hex(random_bytes(32))
        ];

        $this->model->agregar_usuario($data);
        return view("pages/Login", ['success' => "Usuario creado exitosamente. Iniciá Sesión para continuar."]);
      }
      return view("pages/Register", $data);
    }
    return redirect()->to(base_url());
  }
}
