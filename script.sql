CREATE DATABASE minishop;

SHOW minishop;

CREATE TABLE `administrador` (
  `id` int(7) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  `Clave` text NOT NULL
);

INSERT INTO `administrador` (`id`, `Nombre`, `Clave`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

CREATE TABLE `categoria` (
  `CodigoCat` varchar(30) NOT NULL PRIMARY KEY,
  `Nombre` varchar(30) NOT NULL,
  `Descripcion` text NOT NULL
);

CREATE TABLE `cliente` (
  `NIT` varchar(30) NOT NULL PRIMARY KEY,
  `Nombre` varchar(30) NOT NULL,
  `NombreCompleto` varchar(70) NOT NULL,
  `Apellido` varchar(70) NOT NULL,
  `Clave` text NOT NULL,
  `Direccion` varchar(200) NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL
);

CREATE TABLE `cuentabanco` (
  `id` int(50) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `NumeroCuenta` varchar(100) NOT NULL,
  `NombreBanco` varchar(100) NOT NULL,
  `NombreBeneficiario` varchar(100) NOT NULL,
  `TipoCuenta` varchar(100) NOT NULL
);

CREATE TABLE `venta` (
  `NumPedido` int(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Fecha` varchar(150) NOT NULL,
  `NIT` varchar(30) NOT NULL,
  `TotalPagar` decimal(30,2) NOT NULL,
  `Estado` varchar(150) NOT NULL,
  `NumeroDeposito` varchar(50) NOT NULL,
  `TipoEnvio` varchar(37) NOT NULL,
  `Adjunto` varchar(50) NOT NULL,
  FOREIGN KEY (`NIT`) REFERENCES cliente(`NIT`) ON UPDATE CASCADE
);

ALTER TABLE `venta`
  ADD KEY `NIT` (`NIT`),
  ADD KEY `NIT_2` (`NIT`);

CREATE TABLE `detalle` (
  `NumPedido` int(20) NOT NULL,
  `CodigoProd` varchar(30) NOT NULL,
  `CantidadProductos` int(20) NOT NULL,
  `PrecioProd` decimal(30,2) NOT NULL,
  FOREIGN KEY (`NumPedido`) REFERENCES venta(`NumPedido`) ON DELETE CASCADE ON UPDATE CASCADE
);

ALTER TABLE `detalle`
  ADD KEY `NumPedido` (`NumPedido`),
  ADD KEY `CodigoProd` (`CodigoProd`);

CREATE TABLE `proveedor` (
  `NITProveedor` varchar(30) NOT NULL PRIMARY KEY,
  `NombreProveedor` varchar(30) NOT NULL,
  `Direccion` varchar(200) NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  `PaginaWeb` varchar(30) NOT NULL
);

CREATE TABLE `producto` (
  `id` int(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `CodigoProd` varchar(30) NOT NULL,
  `NombreProd` varchar(30) NOT NULL,
  `CodigoCat` varchar(30) NOT NULL,
  `Precio` decimal(30,2) NOT NULL,
  `Descuento` int(2) NOT NULL,
  `Modelo` varchar(30) NOT NULL,
  `Marca` varchar(30) NOT NULL,
  `Stock` int(20) NOT NULL,
  `NITProveedor` varchar(30) NOT NULL,
  `Imagen` varchar(150) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Estado` varchar(15) NOT NULL,
  FOREIGN KEY (`CodigoCat`) REFERENCES categoria(`CodigoCat`) ON UPDATE CASCADE,
  FOREIGN KEY (`NITProveedor`) REFERENCES proveedor(`NITProveedor`) ON UPDATE CASCADE
);

ALTER TABLE `producto`
  ADD KEY `CodigoCat` (`CodigoCat`),
  ADD KEY `NITProveedor` (`NITProveedor`),
  ADD KEY `Agregado` (`Nombre`);
