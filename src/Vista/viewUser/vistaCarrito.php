<!DOCTYPE html>
<html lang="es">
<head>
    <title>Carrito de compras</title>
    <?php include './inc/link.php'; ?>
</head>
<body id="container-page-index">
    <?php include '../Vista/references/navigationBar.php'; //No estoy seguro de que esto funcione por el path
     
    ?>
    <section id="container-pedido">
        <div class="container">
            <div class="page-header">
                <h1>CARRITO DE COMPRAS <small class="tittles-pages-logo">STORE</small></h1>
            </div>
            <br><br><br>
            <div class="row">
                <div class="col-xs-12">
                    <?php
                     
                    require_once "src/Vista/viewUser/carrito-compras-logica.php";
                         
                    if (!empty($productos_carrito)) {
                        echo '<table class="table table-bordered table-hover"><thead><tr class="bg-success"><th>Nombre</th><th>Precio</th><th>Cantidad</th><th>Subtotal</th><th>Acciones</th></tr></thead>';
                        foreach ($productos_carrito as $producto) {
                            echo "<tbody>
                                    <tr>
                                        <td>" . $producto['nombre'] . "</td>
                                        <td> " . $producto['precio'] . "</td>
                                        <td> " . $producto['cantidad'] . "</td>
                                        <td> " . $producto['subtotal'] . "</td>
                                        <td>
                                            <form action='process/quitarproducto.php' method='POST' class='FormCatElec' data-form=''>
                                                <input type='hidden' value='" . $codeProd['producto'] . "' name='codigo'>
                                                <button class='btn btn-danger btn-raised btn-xs'>Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>";
                        }
                        echo '<tr class="bg-danger"><td colspan="2">Total</td><td><strong>' . $sumaA . '</strong></td><td><strong>$' . number_format($suma, 2) . '</strong></td></tr></table><div class="ResForm"></div>';
                        echo '
                        <p class="text-center">
                        <a href="product.php" class="btn btn-primary btn-raised btn-lg">Seguir comprando</a>
                        <a href="process/vaciarcarrito.php" class="btn btn-success btn-raised btn-lg">Vaciar el carrito</a>
                        <a href="pedido.php" class="btn btn-danger btn-raised btn-lg">Confirmar el pedido</a>
                        </p>
                        ';
                    } else {
                        echo '<p class="text-center text-danger lead">El carrito de compras está vacío</p><br>
                        <a href="product.php" class="btn btn-primary btn-lg btn-raised">Ir a Productos</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <?php include './inc/footer.php'; ?>
</body>
</html>
