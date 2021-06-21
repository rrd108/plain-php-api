<?php

// allow all OPTIONS REQUEST
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
  return true;
}

// list resources what need no authentication
$noAuthResources = [
  'GET' => ['products'],
  'POST' => ['users=login'],
  'PATCH' => [],
  'DELETE' => []
];

if (in_array($_SERVER['QUERY_STRING'], $noAuthResources[$_SERVER['REQUEST_METHOD']])) {
  return true;
}

// check the token
$token = isset(apache_request_headers()['Token']) ? apache_request_headers()['Token'] : null;

$stmt = $pdo->prepare('SELECT id FROM users WHERE token = ?');
$stmt->execute([$token]);
if ($stmt->fetch(PDO::FETCH_ASSOC)) {
  return true;
}

http_response_code(401);
die('Authorization error');