<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\MessagesModel;
use CodeIgniter\HTTP\RedirectResponse;


class Message extends BaseController {
  private MessagesModel $model;
  protected $helpers = ["form", "rules"];

  public function __construct() {
    $this->model = new MessagesModel();
  }

  public function contacts(): string {
    return view('pages/Contact');
  }

  public function submit_message() {
    $validationRules = getValidationRules('contact');
    if (!$this->validate($validationRules)) {
      return redirect()->back()->withInput();
    }
    extract($this->request->getPost(['lastname', 'message', 'email']));
    $data = [
      'lastname' => $lastname,
      'message' => $message,
      'email' => $email,
    ];
    $this->model->insert($data);
    return redirect()->to(base_url())->with('msg', [
      'type' => 'success',
      'body' => "Mensaje enviado con exito."
    ]);
  }

  public function all_messages(): string {
    $data = ['messages' => $this->model->all_messages()];
    return view('pages/TableMessages', $data);
  }

  public function read_message(string $id_message) {
    $data = ['message_read' => '1'];
    $this->model->update_message($id_message, $data);
    return redirect()->to(base_url('messages'));
  }
}
