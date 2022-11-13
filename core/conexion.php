<?php

// archivo conexion.php


function conectar(){

$link = mysqli_connect("localhost", "root", "", "resto") or die("Error " . mysqli_error($link));

return $link;

}
?>