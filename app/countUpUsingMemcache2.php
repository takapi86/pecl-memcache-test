<?php

$memcached_servers = [
  "memcached1_alias",
  "memcached2_alias",
  "memcached3_alias",
  "memcached4_alias",
  "memcached5_alias"
];

$memcache = new Memcache;
foreach ($memcached_servers as $server) {
    $memcache->addServer($server, 11211);
}

$value = $memcache->get($_GET["key"]);
$value = $value + 1;
$memcache->set($_GET["key"], $value);

echo $value;

// 1サーバずつ値が取れるか試行するパターン
// $memcache = new Memcache;
// $value = null;
// foreach ($memcached_servers as $server) {
//     $memcache->connect($server, 11211);
//     $value = $memcache->get($_GET["key"]);
//     $memcache->close();
//     if (!empty($value)) {
//         break;
//     }
// }
// echo $value;
