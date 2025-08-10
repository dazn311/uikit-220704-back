<?php

use Utils\Db;
use Utils\App;
use Utils\Validator;

$title = "My Blog :: Register";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    /** @var Db $db */
    $db = App::get(Db::class);
    $data = load(['name', 'email', 'password']);

//    dump($_POST);
//    dump($_FILES);

    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === 0) {
        $data['avatar'] = $_FILES['avatar'];
    } else {
        $data['avatar'] = null;
    }

    $validator = new Validator();

    $validation = $validator->validate($data, [
        'name' => [
            'required' => true,
            'max' => 100,
        ],
        'email' => [
            'email' => true,
            'max' => 100,
            'unique' => 'users:email'
        ],
        'password' => [
            'required' => true,
            'min' => 6,
        ],
        'avatar' => [
            // 'required' => true,
            // 'ext' => 'jpg|jpeg|png',
            'size' => 1_048_576,
        ],
    ]);

    // dd($validation->getErrors());

// dd($data);
  // 'name' => string 'Рыженков Александр Рыженков' (length=52)
  // 'email' => string 'alex2505w@bk.ru' (length=15)
  // 'password' => string '123456' (length=6)
  // 'avatar' => string 'IMG_0295.JPG' (length=12)

// 'name' => string 'Рыженков Александр Рыженков' (length=52)
//   'email' => string 'alex250535@bk.ru' (length=16)
//   'password' => string '123456' (length=6)
//   'avatar' => 
//     array (size=6)
//       'name' => string 'dd1092ce-5ebe-4e71-8187-48b02bd7099f.jpeg' (length=41)
//       'full_path' => string 'dd1092ce-5ebe-4e71-8187-48b02bd7099f.jpeg' (length=41)
//       'type' => string 'image/jpeg' (length=10)
//       'tmp_name' => string '/tmp/phpmCL3xX' (length=14)
//       'error' => int 0
//       'size' => int 229086

    if (!$validation->hasErrors()) {
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        //users (`id`, `email`, `name`, `password`,`createDate`,`remember_me`, `role`)
        //VALUES (null,'Krampsup@gmail.com','Krampsup','12345',NOW(),'1' ,0)
        
        if ($db->query("INSERT INTO users (`name`, `email`, `password`) VALUES (?,?,?)", [$data['name'],$data['email'],$data['password']])) {
          
          if (!empty($data['avatar']['name'])) {
            $id = $db->getInsertId();
            $file_ext = get_file_ext($data['avatar']['name']);
            $dir = '/avatars/' . date('Y') . '/' . date('m') . '/' . date('d');
            if (!is_dir(UPLOADS . $dir)) {
              mkdir(UPLOADS . $dir, 0755, true);
            }
            $filePath = UPLOADS . "{$dir}/avatar-{$id}.{$file_ext}";
            $fileUrl = "/uploads{$dir}/avatar-{$id}.{$file_ext}";
            if (move_uploaded_file($data['avatar']['tmp_name'], $filePath)) {
              $db->query("UPDATE users SET avatar = ? WHERE id = ?", [$fileUrl,$id]);
            } else {
              error_log("[" . date('Y-m-d H:i') . "] Error upload avatar" . PHP_EOL, 3);
            }
          }
          
          $_SESSION['success'] = 'Вы успешно зарегистрировались';
          redirect(PATH);
        } else {
            $_SESSION['error'] = 'DB Error';
        }

        
    }

}

require_once VIEWS . '/users/register.tpl.php';
