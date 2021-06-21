<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if ($_GET['products'] == '') {
    $stmt = $pdo->prepare('SELECT * FROM products');
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return;
  }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $data = json_decode(file_get_contents('php://input'));
  $stmt = $pdo->prepare('INSERT INTO products (category, name, description, picture, price, stock) VALUES (?, ?, ?, ?, ?, ?)');
  $stmt->execute([$data->category, $data->name, $data->description, $data->picture, $data->price, $data->stock]);
  $data->id = $pdo->lastInsertId();
  return;
}