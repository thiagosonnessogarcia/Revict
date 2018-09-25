<?php
$consulta = $pdo- >query("SELECT nome FROM usuario;");
 
  
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    echo "Nome: {$linha['nome']} - Usuário: {$linha['usuario']}<br />";
}
?>