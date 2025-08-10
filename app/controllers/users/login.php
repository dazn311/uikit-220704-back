<?php

use Utils\App;
use Utils\Db;
use Utils\Validator;

$title = "My Blog :: Login";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    /** @var Db $db */
    $db = App::get(Db::class);

    $data = load(['email', 'password']);
    $validator = new Validator();
    $validation = $validator->validate($data, [
        'email' => [
            'email' => true,
        ],
        'password' => [
            'required' => true,
        ],
    ]);

    if (!$validation->hasErrors()) {
        if (!$user = $db->query("SELECT * FROM users WHERE email = ?", [$data['email']])->find()) {
            $_SESSION['error'] = 'Wrong email or password';
            redirect();
        }

        if (!password_verify($data['password'], $user['password'])) {
            $_SESSION['error'] = 'Wrong email or password';
            redirect();
        }

        foreach ($user as $key => $value) {
            if ($key != 'password') {
                $_SESSION['user'][$key] = $value;
            }
        }

        $_SESSION['success'] = 'Successful login';
        redirect(PATH);
    }
}

require_once VIEWS . '/users/login.tpl.php';
