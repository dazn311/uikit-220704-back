<?php
header('Content-Type: application/json; charset=utf-8');
global $root_path2;
$docMeta = require "root_path2/data/Kramp/desadv1248304-edit-modify-250709-krampsup.json";

echo json_encode($docMeta);