<?php
return [
  'driver' => env('DB_CONNECTION', 'mysql'),
  'host' => env('DB_HOST', '127.0.0.1'),
  'port' => 3306,
  'database' => env('DB_NAME', 'wasf_database'),
  'username' => env('DB_USER', 'root'),
  'password' => env('DB_PASS', ''),
];
