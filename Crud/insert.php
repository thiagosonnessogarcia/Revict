<?php  
try {
  $pdo = new PDO('mysql:host=localhost;dbname=revict', $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
  $stmt = $pdo->prepare('INSERT INTO usuario(:id) VALUES (:id)');
  $stmt->execute(array(
    ':id' => 'Ricardo Arrigoni'
  ));
   
  echo $stmt- >rowCount(); 
} catch(PDOException $e) {
  echo 'Error: ' . $e- >getMessage();
  
   ?>