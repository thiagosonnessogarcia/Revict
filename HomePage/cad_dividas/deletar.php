<?php

$sql = " DELETE FROM dividas WHERE (id_cliente, nomegasto, divida)";

echo "<b>nomegasto</b> foi deletado com êxito!<BR>";

echo "<a href=atualizar.php><b>Lista Atualizada</b></a> | ";

?>