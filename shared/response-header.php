<?php

// header("Access-Control-Allow-Origin: https://localhost:3000"); // Разрешить все домены
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Credentials: true");//Чтобы разрешить отправку куки с разных источников
// header("Access-Control-Allow-Headers: content-type,cache-control, X-Requested-With");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Max-Age: 3600");
// header('Content-Type: application/json, text/plain');
header('Content-Type: application/json; charset=utf-8');
