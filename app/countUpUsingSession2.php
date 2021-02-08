<?php

$memcached_servers = [
  "memcached1_alias",
  "memcached2_alias",
  "memcached3_alias",
  "memcached4_alias",
  "memcached5_alias"
];

$save_path = generateSavePath($memcached_servers);

ini_set('session.save_handler', 'memcache');
ini_set('session.save_path', $save_path);
session_start();

var_dump($_COOKIE["PHPSESSID"]);
var_dump($_SESSION);
$_SESSION["COUNT"] = $_SESSION["COUNT"] + 1;

function generateSavePath($memcached_servers)
{
  $save_path = "";
  foreach ($memcached_servers as $memcached) {
    $save_path .= "tcp://{$memcached}:11211,";
  }

  return substr($save_path, 0, -1);
}