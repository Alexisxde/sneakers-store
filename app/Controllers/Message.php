<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\MessagesModel;
use CodeIgniter\HTTP\RedirectResponse;


class Message extends BaseController {
  private MessagesModel $model;

  public function __construct() {
    $this->model = new MessagesModel();
  }

  public function all_messages(): string|RedirectResponse {
    $messages = $this->model->all_messages();
    $data = ['messages' => $messages];
    return view('pages/TableMessages', $data);
  }
}
