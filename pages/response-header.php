<?php

header("Access-Control-Allow-Origin: localhost:3000"); // Разрешить все домены
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
// header("Access-Control-Allow-Headers: content-type");
// 'Access-Control-Allow-Origin' header has a value 'localhost:3000'
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Headers: X-Requested-With");