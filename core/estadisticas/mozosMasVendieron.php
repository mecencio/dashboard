<?php

    $consulta = "SELECT COUNT(pedidos.id) as cantidad, usuarios.nombre as nombre, usuarios.apellido as apellido FROM `pedidos` JOIN `usuarios` ON `usuarios`.`id` = pedidos.idMozo GROUP BY `pedidos`.`idMozo` ORDER BY COUNT(pedidos.idMozo) DESC LIMIT 3;";
    $resultado = mysqli_query($link,$consulta);

?>