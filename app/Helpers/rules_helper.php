<?php

function getValidationRules(string $form): array {
  $rules = match ($form) {
    'login' => [
      'username' => [
        'label' => 'username',
        'rules' => 'required|alpha_dash|is_lowercase',
        'errors' => [
          'required' => 'El nombre de usuario no puede estar vacío.',
          'alpha_dash' => 'El nombre de usuario no puede contener espacios o símbolos.',
          'is_lowercase' => 'El nombre de usuario debe estar en minúsculas.',
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
          'required' => 'El nombre de usuario no puede estar vacío.',
          'is_unique' => 'El nombre de usuario ya está en uso. Por favor, elige otro nombre de usuario.',
          'min_length' => 'El nombre de usuario tiene que tener mínimo 5 caracteres.',
          'max_length' => 'El nombre de usuario tiene que tener máximo 30 caracteres.',
          'alpha_dash' => 'El nombre de usuario no puede contener espacios o símbolos.',
          'is_lowercase' => 'El nombre de usuario debe estar en minúsculas.'
        ]
      ],
      'password' => [
        'label' => 'password',
        'rules' => 'required|min_length[5]|alpha_dash',
        'errors' => [
          'required' => 'La contraseña no puede estar vacia.',
          'min_length' => 'La contraseña tiene que tener mínimo 8 caracteres.',
          'alpha_dash' => 'La contraseña no puede contener espacios.',
        ]
      ],
      'confirmpassword' => [
        'label' => 'confirmpassword',
        'rules' => 'required|matches[password]',
        'errors' => [
          'required' => 'Por favor confirme su contraseña',
          'matches' => 'La contraseña no soy iguales.',
        ]
      ],
      'name' => [
        'label' => 'name',
        'rules' => 'required|min_length[3]|max_length[30]',
        'errors' => [
          'required' => 'El nombre no puede estar vacío.',
          'max_length' => 'El nombre tiene que tener máximo 30 caracteres.',
          'min_length' => 'El nombre tiene que tener mínimo 3 caracteres.'
        ],
      ],
      'email' => [
        'label' => 'email',
        'rules' => 'required|valid_email|is_unique[users.email]',
        'errors' => [
          'required' => 'El correo electrónico no puede estar vacío.',
          'valid_email' => 'Introduzca un correo electrónico valido.',
          'is_unique' => 'El correo electrónico ya está en uso. Por favor, elige otro.'
        ],
      ],
      'surname' => [
        'label' => 'surname',
        'rules' => 'required|min_length[3]|max_length[30]',
        'errors' => [
          'required' => 'El apellido no puede estar vacío.',
          'max_length' => 'El apellido tiene que tener máximo 30 caracteres.',
          'min_length' => 'El apellido tiene que tener mínimo 3 caracteres.'
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
          'required' => 'El modelo no puede estar vacío.',
        ]
      ],
      'sneaker_price_purchase' => [
        'label' => 'sneaker_price_purchase',
        'rules' => 'required|numeric',
        'errors' => [
          'required' => 'El precio de compra no puede estar vacío.',
          'numeric' => 'Tiene que ser numerico.'
        ]
      ],
      'sneaker_price' => [
        'label' => 'sneaker_price',
        'rules' => 'required|numeric',
        'errors' => [
          'required' => 'El precio de venta no puede estar vacío.',
          'numeric' => 'Tiene que ser numerico.'
        ]
      ],
      'sneaker_discount' => [
        'label' => 'sneaker_discount',
        'rules' => 'required',
        'errors' => [
          'required' => 'El descuento no puede estar vacío.',
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
      'sneaker_size' => [
        'label' => 'sneaker_size',
        'rules' => 'required|numeric',
        'errors' => [
          'required' => 'Se necesita por lo menos un talle.',
          'numeric' => 'Tiene que ser numerico el tipo de talle.',
        ]
      ],
      'sneaker_stock' => [
        'label' => 'sneaker_stock',
        'rules' => 'required|numeric',
        'errors' => [
          'required' => 'Ponga 0 si no hay stock.',
          'numeric' => 'Tiene que ser numerico el tipo el stock.',
        ]
      ],
    ],
    'edit_sneaker' => [
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
          'required' => 'El modelo no puede estar vacío.',
        ]
      ],
      'sneaker_price' => [
        'label' => 'sneaker_price',
        'rules' => 'required|numeric',
        'errors' => [
          'required' => 'El precio no puede estar vacío.',
          'numeric' => 'Tiene que ser numerico.'
        ]
      ],
      'sneaker_discount' => [
        'label' => 'sneaker_discount',
        'rules' => 'required',
        'errors' => [
          'required' => 'El descuento no puede estar vacío.',
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
    ],
    'settings' => [
      'id_user' => 'is_not_unique[users.id_user]',
      'username' => 'is_not_unique[users.username]',
      'newpassword' => [
        'label' => 'newpassword',
        'rules' => 'required|min_length[8]|alpha_dash',
        'errors' => [
          'required' => 'La contraseña no puede estar vacia.',
          'min_length' => 'La contraseña tiene que tener mínimo 8 caracteres.',
          'alpha_dash' => 'La contraseña no puede contener espacios.',
        ]
      ],
      'newconfirmpassword' => [
        'label' => 'newconfirmpassword',
        'rules' => 'required|matches[newpassword]',
        'errors' => [
          'required' => 'Por favor confirme su contraseña',
          'matches' => 'La contraseñas no soy iguales.',
        ]
      ],
      'password' => [
        'label' => 'password',
        'rules' => 'required',
        'errors' => ['required' => 'Escriba su nueva contraseña.',]
      ],
      'confirmpassword' => [
        'label' => 'confirmpassword',
        'rules' => 'required|matches[password]',
        'errors' => [
          'required' => 'Por favor confirme su nueva contraseña',
          'matches' => 'La contraseña no soy iguales.',
        ]
      ],
    ],
    'add_cart' => [
      'id_sneaker' => 'required|is_not_unique[sneakers.id_sneaker]'
    ],
    'contact' => [
      'lastname' => [
        'label' => 'lastname',
        'rules' => 'required',
        'errors' => [
          'required' => 'Ingrese su nombre completo por favor.',
        ]
      ],
      'email' => [
        'label' => 'email',
        'rules' => 'required|valid_email',
        'errors' => [
          'required' => 'El correo electrónico no puede estar vacío.',
          'valid_email' => 'Introduzca un correo electrónico valido.',
        ],
      ],
      'message' => [
        'label' => 'message',
        'rules' => 'required|min_length[10]',
        'errors' => [
          'required' => 'Escriba su mensaje por favor.',
          'min_length' => 'Escriba un mensaje un poco más detallado.'
        ],
      ],
    ],
    default => []
  };
  return $rules;
}
