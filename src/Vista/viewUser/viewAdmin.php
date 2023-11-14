<?php
    include './../../Config/configSQL.php';
    include './../../Modelo/consulSQL.php';
    include './../../Controlador/ControlAdmin/securityPanel.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Admin</title>
    <?php include './../references/link.php'; ?>
</head>
<body id="container-page-configAdmin">
    <?php include './../references/navigationBar.php'; ?>
    <section id="prove-product-cat-config">
        <div class="container">
          <div class="page-header">
            <h1>Panel de administración <small class="tittles-pages-logo">MINI-SHOPPING</small></h1>
          </div>
          <!--====  Nav Tabs  ====-->
          <ul class="nav nav-tabs nav-justified" style="margin-bottom: 15px;">
            <li>
              <a href="./viewAdmin.php?view=product">
                <i class="fa fa-cubes" aria-hidden="true"></i> &nbsp; Productos
              </a>
            </li>
            <li>
              <a href="./viewAdmin.php?view=provider">
                <i class="fa fa-truck" aria-hidden="true"></i> &nbsp; Proveedores
              </a>
            </li>
            <li>
              <a href="./viewAdmin.php?view=category">
                <i class="fa fa-shopping-basket" aria-hidden="true"></i> &nbsp; Categorías
              </a>
            </li>
            <li>
              <a href="./viewAdmin.php?view=admin">
                <i class="fa fa-users" aria-hidden="true"></i> &nbsp; Administradores
              </a>
            </li>
            <li>
              <a href="./viewAdmin.php?view=order">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i> &nbsp; Pedidos
              </a>
            </li>
            <li>
              <a href="./viewAdmin.php?view=bank">
                <i class="fa fa-university" aria-hidden="true"></i> &nbsp; Cuenta bancaria
              </a>
            </li>
            <li>
              <a href="./viewAdmin.php?view=account">
                <i class="fa fa-address-card" aria-hidden="true"></i> &nbsp; Mi cuenta
              </a>
            </li>
          </ul>
          <?php
            $content=$_GET['view'];
            $WhiteList=["product","productlist","productinfo","provider","providerlist","providerinfo","category","categorylist","categoryinfo","admin","adminlist","order","bank","account"];
            if(isset($content)){
              if(in_array($content, $WhiteList) && is_file("./../viewAdmin/".$content."-view.php")){
                include "./../viewAdmin/".$content."-view.php";
              }else{
                echo '<h2 class="text-center">Lo sentimos, la opción que ha seleccionado no se encuentra disponible</h2>';
              }
            }else{
              echo '<h2 class="text-center">Para empezar, por favor escoja una opción del menú de administración</h2>';
            }
          ?>
        </div>
    </section>
    <?php include './../references/footer.php'; ?>
</body>
</html>