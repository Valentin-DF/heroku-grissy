var precio_producto = function () {
    return {
        obtenerProductos: function () {
            $('#example').DataTable().destroy();
            $('#example').empty();
            var table = $('#example').DataTable({
                "ajax": {
                    "method": "GET",
                    "url": "http://localhost:8080/Grissy/controllers/Producto/obtenerListaProductos.php",
                    "dataSrc": ""
                },
                "columns": [
                    { "title": "Codigo", "data": "codigo" },
                    { "title": "Nombre", "data": "nombre" },
                    { "title": "Talla", "data": "talla" },
                    {
                        "title": "Acciones", "defaultContent": "<button type='button' class='vista btn btn-outline-primary btn-sm' data-bs-toggle='modal' data-bs-target='#agregarProducto' ><i class='fa-solid fa-eye'></i></button>"
                    }],
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
                },
            });
            precio_producto.vistaProducto("#example tbody", table);
        },

        vistaProducto: function (tbody, table) {
            var div = document.getElementById('mostraActualizar');
            var div2 = document.getElementById('mostraActualizar2');

            $(tbody).on("click", "button.vista", function () {
                var data = table.row($(this).parents("tr")).data();
                $("#id").val(data.id);
                $("#codigoPro").val(data.codigo);
                $("#precio_actual").val(data.precio);
                div.style.visibility = 'visible';
                div2.style.visibility = 'visible';

                precio_producto.historialDePreciosProveedores(data.id);
            });
        },

        actualizarPrecio: function () {
            var div = document.getElementById('mostraActualizar');
            var div2 = document.getElementById('mostraActualizar2');
            div.style.visibility = 'hidden';
            div2.style.visibility = 'hidden';
        },

        historialDePreciosProveedores: function (producto) {
            $('#example2').DataTable().destroy();
            $('#example2').empty();
            var table = $('#example2').DataTable({
                "ajax": {
                    "method": "GET",
                    "url": "http://localhost:8080/Grissy/controllers/Ordenes/mostrarProductosPorFechaOrden.php",
                    "data": {
                        idproducto: producto
                    },
                    "dataSrc": ""
                },
                "columns": [
                    { "title": "Fecha", "data": "fecha" },
                    { "title": "Documento", "data": "documento" },
                    { "title": "Precio", "data": "precio" }],
                "order": [[0, 'desc']],
                "lengthMenu": [5, 10],
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
                },
            });
        },



    }
}();