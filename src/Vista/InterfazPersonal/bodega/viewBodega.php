<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Productos</title>
    <link rel="stylesheet" href="estilo.css"/>

</head>
<body>
    <div id="principal">
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
        }

        function cambiarContenido(contenido) {
            document.getElementById('resultado').innerText = contenido;
        }

        function agregarProducto() {
            var nombre = document.getElementById('nombre').value;
            var cantidad = document.getElementById('cantidad').value;
            var precio = document.getElementById('precio').value;
            var imagen = document.getElementById('imagen').value;
            var resultado = `
                Producto: ${nombre}, 
                Cantidad: ${cantidad}, 
                Precio: ${precio},
                Imagen: <img src="${imagen}" alt="${nombre}" style="max-width: 100px;">`;
            
            document.getElementById('resultado').innerHTML = resultado;


            document.getElementById('formulario').style.display = 'none';
            document.getElementById('nombre').value = '';
            document.getElementById('cantidad').value = '';
            document.getElementById('precio').value = '';
            document.getElementById('imagen').value = '';
        }
    </script>
</body>
</html>
