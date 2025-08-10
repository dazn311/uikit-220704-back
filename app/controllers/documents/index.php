<?php
use Utils\App;
use Utils\Db;

$title = 'My Blog :: Home';

$db = App::get(Db::class);

$documents = $db->query("
SELECT * FROM documents 
    LEFT JOIN users 
        ON documents.userId = users.id 
         WHERE documents.mode = 'edit';");

if ($documents) {
    $documents = $documents->findAll();
    if (!$documents) {
        $documents = [];
    }
} else {
    $documents = [];
}
//      'id' => int 1
//      'type' => string 'invrpt' (length=6)
//      'idDoc' => string 'new' (length=3)
//      'mode' => string 'edit' (length=4)
//      'createDate' => string '2025-08-10 21:22:10' (length=19)
//      'userId' => int 1
//      'fileName' => string 'invrpt-new-edit-Krampsup-250807.json' (length=36)
//      'email' => string 'kramp@gmail.com' (length=15)
//      'name' => string 'Kramp' (length=5)
//      'password' => string '12345' (length=5)
//      'remember_me' => string '1' (length=1)
//      'avatar' => string '/uploads/avatar.png' (length=19)
//      'role' => int 0
//}
//dd($documents);

$posts[] = [
    'id'=> 1,
    'title'=> 'title 1',
    'excerpt'=> 'excerpt 1',
];

$posts[] = [
    'id'=> 2,
    'title'=> 'title 2',
    'excerpt'=> 'excerpt 2',
];

$recent_posts[] = [
    'id'=> 2,
    'title'=> 'title 2',
];

require_once VIEWS . '/documents/index.tpl.php';

/**
SELECT
    Orders.OrderID,
    Customers.CustomerName,
    Orders.OrderDate
FROM
    Orders
INNER JOIN
    Customers ON Orders.CustomerID = Customers.CustomerID
WHERE
    Customers.City = 'London'
    AND Orders.OrderDate > '2024-01-01';
 */

/**
 * $documents = $db->query("
 * SELECT
 * documents.fileName,
 * documents.type,
 * documents.idDoc,
 * Customers.CustomerName,
 * users.name,
 * users.avatar
 * FROM
 * documents
 * INNER JOIN
 * users ON documents.userId = users.id
 * WHERE
 * documents.type = 'invrpt'
 * AND documents.mode > 'edit';");
 */