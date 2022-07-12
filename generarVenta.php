<?php
session_start();
$foliov = date('mdYhis', time());

include("connect/connection-mysql.php");
$queryP = "call insertar_venta ('" . $foliov . "','" . $_SESSION['usuario'] . "')";
$exeqQuery = mysqli_query($connect, $queryP);
$tabla = mysqli_fetch_array($exeqQuery);
if ($tabla[0] == "exito") {

    include("connect/connection-mysql.php");
    $queryP = "SELECT * FROM carrito";
    $ejectQuery = mysqli_query($connect, $queryP);
    while ($tabla = mysqli_fetch_array($ejectQuery)) {
        include("connect/connection-mysql.php");
        $queryP = "call insertar_dventa ('" . $foliov . "','" . $tabla[2] . "','" . $tabla[4]."','".$tabla[3] . "');";
        mysqli_query($connect, $queryP);
        
    }
    echo "<br><h1>productos agregados con exito</h1>";
    echo "<br>";
    echo "<a href='generarFactura.php?folio=".$foliov."'>generar factura</a>";
} else {
    echo "<h1>no se puedo agregar la compra</h1><br>";
    echo "<a href='compras.php'>volver</a>";
}