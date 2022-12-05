<?php

    $consulta = "SELECT COUNT(pedidos.id) as cantidad, items_menu.nombre as nombre, items_menu.id as idItem, items_menu.precio as precio FROM `pedidos` JOIN `items_menu` ON `items_menu`.`id` = pedidos.idItemMenu GROUP BY `pedidos`.`idItemMenu` ORDER BY COUNT(pedidos.id) DESC LIMIT 10;";
    $resultado = mysqli_query($link,$consulta);

?>