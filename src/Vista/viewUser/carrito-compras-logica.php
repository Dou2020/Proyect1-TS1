<?php
require_once "./../Modelo/configServer.php";
require_once "./Modelo/consulSQL.php";

$productos_carrito = [];

if (!empty($_SESSION['carro'])) {
    $suma = 0;
    $sumaA = 0;
    foreach ($_SESSION['carro'] as $codeProd) {
        $consulta = ejecutarSQL::consultar("SELECT * FROM producto WHERE CodigoProd='" . $codeProd['producto'] . "'");
        while ($fila = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
            $pref = number_format(($fila['Precio'] - ($fila['Precio'] * ($fila['Descuento'] / 100))), 2, '.', '');

            $productos_carrito[] = [
                'nombre' => $fila['NombreProd'],
                'precio' => $pref,
                'cantidad' => $codeProd['cantidad'],
                'subtotal' => $pref * $codeProd['cantidad']
            ];

            $suma += $pref * $codeProd['cantidad'];
            $sumaA += $codeProd['cantidad'];
        }
        mysqli_free_result($consulta);
    }
}
?>
