<?php
function getFileNameFromDir() {
  global $root_path2;
  $dir = $root_path2 . $_ENV['BASEAPIURL']; // Замените на нужный вам путь
  $pattern = $dir . '/Kramp/' . '*.json'; // Шаблон для поиска файлов с расширением .php
  
  echo $pattern;
  $files = glob($pattern);

  if ($files) {
      foreach ($files as $file) {
          echo $file . "<br>";
      }
  } else {
      echo "Файлы не найдены";
  }
}