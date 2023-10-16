<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Productos</title>
    <link rel="stylesheet" href="estilo.css"/>
</head>
<body>
    <div id="principal">
        <h1 style="text-align: center;">Bodega Grande</h1>

        <div id="botones">
            <button onclick="mostrarFormulario()">Agregar Producto</button>
            <button onclick="cambiarContenido('Contenido 2')">Modificar Producto</button>
            <button onclick="cambiarContenido('Contenido 3')">Listar Producto</button>
        </div>
        <div id="contenido-dinamico">
            <div id="resultado"></div>
            <div id="formulario">
                <label for="nombre">Nombre del Producto:</label>
                <input type="text" id="nombre" placeholder="Ingrese el nombre del producto">

                <label for="cantidad">Cantidad:</label>
                <input type="number" id="cantidad" placeholder="Ingrese la cantidad">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" placeholder="Ingrese el precio">

                <label for="imagen">Enlace de Imagen:</label>
                <input type="text" id="imagen" placeholder="Ingrese el enlace de la imagen">

                <button onclick="agregarProducto()">Agregar</button>
            </div>
        </div>
    </div>

    <script>
        function mostrarFormulario() {
            document.getElementById('formulario').style.display = 'block';
            limpiarResultado(); // Agregamos esta línea para limpiar el resultado
        }

        function cambiarContenido(contenido) {
            document.getElementById('formulario').style.display = 'none';
            document.getElementById('resultado').innerText = contenido;
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

            document.getElementById('formulario').style.display = 'none';
            limpiarFormulario(); // Agregamos esta línea para limpiar el formulario
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
