<?php

    //$host="127.0.0.1";
    $host="localhost";
    $port="5432";
    $user="postgres";
    $passwd="admin";
    $dbname="db_mdo_2019";

    $conn = pg_connect("user=$user host=$host port=$port dbname=$dbname password=$passwd");

    if (!$conn)
    {
        echo "<script type=\"text/javascript\">alert('Error, Problemas de conexión a la Base de Datos: $dbname.');</script>";
        //echo "Error, Problemas al conectar con la Base de Datos: ".$dbname;
        exit;
    }
    else
    {
        //echo "<script type=\"text/javascript\">alert('Conexion exitosa a la Base de Datos: $dbname.');</script>";
        //echo "Conexión exitosa a la Base de datos: ".$dbname." Retorna: ".$conn;
        return $conn;
    }
?>
