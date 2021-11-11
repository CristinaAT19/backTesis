<?php
    $dsn = sprintf('mysql:dbname=%s;host=%s', "u995095518_pruebasback1", "sql532.main-hosting.eu");
    $obj_conexion =  new PDO($dsn, "u995095518_pruebasback1", "wF[6Cd]nz64");
    $obj_conexion->query("call pa_insertar_faltas(2)");
?>