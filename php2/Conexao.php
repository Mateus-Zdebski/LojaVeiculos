<?php

$con = mysqli_connect("localhost", "root", "", "motorcode");
if (!$con) {
    die("Erro na conexão: " . mysqli_connect_error());
}
?>