<?php

function getValidationRules(string $form): array {
  $rules = match ($form) {
    'login' => [
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
    ],
    'register' => [
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
          'required' => 'El correo electrónico no puede estar vacio.',
          'valid_email' => 'Introduzca un correo electrónico valido.',
          'is_unique' => 'El correo electrónico ya está en uso. Por favor, elige otro.'
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
    ],
    'add_sneaker' => [
      'sneaker_brand' => [
        'label' => 'sneaker_brand',
        'rules' => 'required',
        'errors' => [
          'required' => 'La marca no puede estar vacia.',
        ]
      ],
      'sneaker_model' => [
        'label' => 'sneaker_model',
        'rules' => 'required',
        'errors' => [
          'required' => 'El modelo no puede estar vacio.',
        ]
      ],
      'sneaker_price' => [
        'label' => 'sneaker_price',
        'rules' => 'required|numeric',
        'errors' => [
          'required' => 'El precio no puede estar vacio.',
          'numeric' => 'Tiene que ser numerico.'
        ]
      ],
      'sneaker_discount' => [
        'label' => 'sneaker_discount',
        'rules' => 'required',
        'errors' => [
          'required' => 'El descuento no puede estar vacio.',
        ]
      ],
      'sneaker_stars' => [
        'label' => 'sneaker_stars',
        'rules' => 'required',
        'errors' => [
          'required' => 'La valoración no puede ser vacia.',
        ]
      ],
      'sneaker_description' => [
        'label' => 'sneaker_description',
        'rules' => 'required',
        'errors' => [
          'required' => 'La descripción no puede ser vacia.',
        ]
      ],
      'sneaker_img' => [
        'label' => 'sneaker_img',
        'rules' => 'ext_in[sneaker_img,png,jpg,webp,jfif]',
        'errors' => [
          'required' => 'Se necesita la imagen.',
          'ext_in' => 'La extenciones solo pueden ser .png, .jpg, .webp y .jfif',
        ]
      ],
    ],
    default => []
  };
  return $rules;
}
