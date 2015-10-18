<?php 
session_start();

$evento = $_POST['evento'];

$vista = file_get_contents($evento . '.html');
print_r($vista);

?>