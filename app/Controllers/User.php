<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\RedirectResponse;

class User extends BaseController {
  private UserModel $model;
  protected $helpers = ['form'];

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
      $users = $this->model->all_users();
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
    $rules = [
      'username' => [
        'label' => 'username',
        'rules' => 'required|alpha_dash|is_lowercase|validate_username[users.username]',
        'errors' => [
          'required' => 'El nombre de usuario no puede estar vacio.',
          'alpha_dash' => 'El nombre de usuario no puede contener espacios o simbolos.',
          'is_lowercase' => 'El nombre de usuario debe estar en minúsculas.',
          'validate_username' => 'El nombre de usuario es incorrecto.'
        ]
      ],
      'password' => [
        'label' => 'password',
        'rules' => 'required|alpha_dash',
        'errors' => [
          'required' => 'La contraseña no puede estar vacia.',
          'alpha_dash' => 'La contraseña no puede contener espacios.',
        ]
      ],
    ];

    if (!isset($this->session->username) || $this->session->rol === 'admin') {
      extract($this->request->getPost(['username', 'password']));
      if (!$this->validate($rules)) {
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
    return redirect()->to(base_url());
  }


  public function create_user(): string|RedirectResponse {
    $rules = [
      'username' => [
        'label' => 'username',
        'rules' => 'required|is_unique[users.username]|min_length[5]|max_length[30]|alpha_dash|is_lowercase',
        'errors' => [
          'required' => 'El nombre de usuario no puede estar vacio.',
          'is_unique' => 'El nombre de usuario ya está en uso. Por favor, elige otro nombre de usuario.',
          'min_length' => 'El nombre de usuario tiene que tener minimo 5 caracteres.',
          'max_length' => 'El nombre de usuario tiene que tener maximo 30 caracteres.',
          'alpha_dash' => 'El nombre de usuario no puede contener espacios o simbolos.',
          'is_lowercase' => 'El nombre de usuario debe estar en minúsculas.'
        ]
      ],
      'password' => [
        'label' => 'password',
        'rules' => 'required|min_length[5]|alpha_dash',
        'errors' => [
          'required' => 'La contraseña no puede estar vacia.',
          'min_length' => 'La contraseña tiene que tener minimo 8 caracteres.',
          'alpha_dash' => 'La contraseña no puede contener espacios.',
        ]
      ],
      'name' => [
        'label' => 'name',
        'rules' => 'required|min_length[3]|max_length[30]',
        'errors' => [
          'required' => 'El nombre no puede estar vacio.',
          'max_length' => 'El nombre tiene que tener maximo 30 caracteres.',
          'min_length' => 'El nombre tiene que tener minimo 3 caracteres.'
        ],
      ],
      'email' => [
        'label' => 'email',
        'rules' => 'required|valid_email|is_unique[users.email]',
        'errors' => [
          'required' => 'El correo electronico no puede estar vacio.',
          'valid_email' => 'Introduzca un correo electronico valido.',
          'is_unique' => 'El correo electronico ya está en uso. Por favor, elige otro.'
        ],
      ],
      'surname' => [
        'label' => 'surname',
        'rules' => 'required|min_length[3]|max_length[30]',
        'errors' => [
          'required' => 'El apellido no puede estar vacio.',
          'max_length' => 'El apellido tiene que tener maximo 30 caracteres.',
          'min_length' => 'El apellido tiene que tener minimo 3 caracteres.'
        ],
      ],
    ];

    if (!isset($this->session->username) || $this->session->rol === 'admin') {
      if (!$this->validate($rules)) {
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
    return redirect()->to(base_url());
  }
}
