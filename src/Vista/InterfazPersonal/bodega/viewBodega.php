<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Productos</title>
    <link rel="stylesheet" href="estilo.css"/>
</head>
<body>
    <div id="principal">
        <h1 style="text-align: center;">Area de bodega</h1>

        <div id="botones">
            <button onclick="mostrarFormulario('formulario')">Agregar Producto</button>
            <button onclick="mostrarFormulario('modificarForm')">Modificar Producto</button>
            <button onclick="listarProductos()">Listar Producto</button>
        </div>
        <div id="contenido-dinamico">
            <div id="resultado"></div>
            <div id="formulario" style="display: none;">
                <label for="nombre">Nombre del Producto:</label>
                <input type="text" id="nombre" placeholder="Ingrese el nombre del producto">

                <label for="cantidad">Cantidad:</label>
                <input type="number" id="cantidad" placeholder="Ingrese la cantidad">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" placeholder="Ingrese el precio">

                <label for="imagen">Imagen de referencia:</label>
                <input type="text" id="imagen" placeholder="Ingrese el enlace de la imagen de referencia">

                <button onclick="agregarProducto()">Agregar</button>
            </div>
            <div id="modificarForm" style="display: none;">
                <label for="codigo">Código del Producto:</label>
                <input type="text" id="codigo" placeholder="Ingrese el código del producto">
                <label for="nuevoNombre">Nuevo Nombre:</label>
                <input type="text" id="nuevoNombre" placeholder="Ingrese el nuevo nombre">
                <label for="nuevoPrecio">Nuevo Precio:</label>
                <input type="number" id="nuevoPrecio" placeholder="Ingrese el nuevo precio">
                <label for="nuevoEnlace">Nuevo Enlace de Imagen:</label>
                <input type="text" id="nuevoEnlace" placeholder="Ingrese el nuevo enlace de la imagen">
                <button onclick="modificarProducto()">Modificar</button>
            </div>
            <div id="tablaProductos" style="display: none;">
                <!-- Tabla para listar productos -->
                <table id="tabla">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function mostrarFormulario(formulario) {
            if (formulario === 'formulario') {
                document.getElementById('formulario').style.display = 'block';
                document.getElementById('modificarForm').style.display = 'none';
                document.getElementById('tablaProductos').style.display= 'none';
            } else if (formulario === 'modificarForm') {
                document.getElementById('modificarForm').style.display = 'block';
                document.getElementById('formulario').style.display = 'none';
                document.getElementById('tablaProductos').style.display= 'none';
            }
            limpiarResultado();
        }
        function listarProductos() {

            var productos = [
                // Aquí debes tener un arreglo con los datos de tus productos
                { codigo: '001', nombre: 'Producto 1', cantidad: 10, precio: 25.99 },
                { codigo: '002', nombre: 'Producto 2', cantidad: 5, precio: 19.99 },
                // Agrega más productos
            ];

            var tabla = document.querySelector('#tablaProductos table tbody');
            tabla.innerHTML = '';

            productos.forEach(function(producto) {
                var fila = document.createElement('tr');
                fila.innerHTML = `
                    <td>${producto.codigo}</td>
                    <td>${producto.nombre}</td>
                    <td>${producto.cantidad}</td>
                    <td>${producto.precio}</td>
                `;
                tabla.appendChild(fila);
            });

            var formAgregar = document.getElementById('formulario');
            var formModificar = document.getElementById('modificarForm');
            formAgregar.style.display = 'none';
            formModificar.style.display = 'none';
            document.getElementById('tablaProductos').style.display = 'block';
        }
        function agregarProducto() {
            var nombre = document.getElementById('nombre').value;
            var cantidad = document.getElementById('cantidad').value;
            var precio = document.getElementById('precio').value;
            var imagen = document.getElementById('imagen').value;
            var resultado = `
                <p>Producto agregado con éxito</p>
                <p>Producto: ${nombre}</p>
                <p>Cantidad: ${cantidad}</p>
                <p>Precio: ${precio}</p>
                <p>Imagen:</p>
                <p> <img src="${imagen}" alt="${nombre}" style="max-width: 100px;"></p>`;
            document.getElementById('resultado').innerHTML = resultado;
            limpiarFormulario();
            document.getElementById('formulario').style.display = 'none';
        }

        function modificarProducto() {
            var codigo = document.getElementById('codigo').value;
            var nuevoNombre = document.getElementById('nuevoNombre').value;
            var nuevoPrecio = document.getElementById('nuevoPrecio').value;
            var nuevoEnlace = document.getElementById('nuevoEnlace').value;
            // Aquí deberías implementar la lógica para modificar el producto con el código proporcionado
        }

        function limpiarResultado() {
            document.getElementById('resultado').innerHTML = '';
        }
                function limpiarFormulario() {
            document.getElementById('nombre').value = '';
            document.getElementById('cantidad').value = '';
            document.getElementById('precio').value = '';
            document.getElementById('imagen').value = '';
        }
    </script>
</body>
</html>

