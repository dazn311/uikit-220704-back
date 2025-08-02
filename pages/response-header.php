<?php

header("Access-Control-Allow-Origin: *"); // Разрешить все домены
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Headers: X-Requested-With");