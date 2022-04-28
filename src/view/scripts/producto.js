var producto = function () {

    return {
        obtenerListaProductos: function () {
            $.ajax({
                url: "http://localhost:8080/Grissy/controllers/Producto/obtenerListaProductos.php",
                method: "GET",
                timeout: 0,
                success: function (response) {

                    console.log(response);
                    

                    var objListado = JSON.parse(response);
                    $(objListado).each(function (i, obj) {
                        var producto = '';
                        producto += '<tr>';
                        producto += '<td>' + obj.codigo + '</td>';
                        producto += '<td>' + obj.nombre + '</td>';
                        producto += '<td>' + obj.cantidad + '</td>';
                        producto += '<td>' + obj.precio + '</td>';
                        producto += '<td>' + obj.talla + '</td>';
                        if (obj.estado == 1) {
                            producto += '<td><span class="badge bg-success">Activo</span></td>';
                        } else {
                            producto += '<td><span class="badge bg-danger">Inactive</span></td>';
                        }
                        producto += '<td><button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#agregarProducto" onclick="producto.obtenerPorId(' + obj.id + ')"><span class="fa-fw select-all fas"></span></button>' +
                            '<button class="btn btn-outline-danger" onclick="producto.eliminarProducto(' + obj.id + ')" ><span class="fa-fw select-all fas"></span></button></td>';
                        producto += '</tr>';

                        $("#lst-producto").append(producto);
                    });
                }
            })

        },
        guardarProducto: function () {

            var codigo = $("#codigo").val();
            var nombre = $("#nombre").val();
            var talla = $("#talla").val();
            var cantidad = $("#cantidad").val();
            var precio = $("#precio").val();
            var idArea = 1;
            var estado = 1;
            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/Producto/guardarProducto.php',
                method: "POST",
                data: {
                    codigo: codigo,
                    nombre: nombre,
                    talla: talla,
                    cantidad: cantidad,
                    precio: precio,
                    estado: estado,
                    idArea: idArea
                },
                complete: function (response) { 
                    console.log(response);
                    $("#lst-producto").empty();
                    producto.obtenerListaProductos();
                    producto.limpiar();
                }
            });
        },
        eliminarProducto: function (id) {
            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/Producto/eliminarProducto.php',
                method: "POST",
                data: {
                    id: id
                },
                complete: function (response) { 
                    console.log(response);
                    $("#lst-producto").empty();
                    producto.obtenerListaProductos();
                }
            });
        },
        editarProducto: function () {
            var codigo = $("#codigo").val();
            var nombre = $("#nombre").val();
            var talla = $("#talla").val();
            var cantidad = $("#cantidad").val();
            var precio = $("#precio").val();

            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/Producto/editarProducto.php',
                method: "POST",
                data: {
                    codigo: codigo,
                    nombre: nombre,
                    talla: talla,
                    cantidad: cantidad,
                    precio: precio
                },
                complete: function (response) {
                    console.log(response);
                    $("#lst-producto").empty();
                    producto.obtenerListaProductos();
                    producto.limpiar();
                }
            });
        },
        obtenerPorId: function(id) {
            $.ajax({
                url: "http://localhost:8080/Grissy/controllers/Producto/buscarProductoPorId.php",
                method: "GET",
                data: {
                    id: id
                },
                timeout: 0,
                success: function (response) {

                    console.log(response);

                    var objListado = JSON.parse(response);
                    $(objListado).each(function (i, obj) {

                        $("#codigo").val(obj.codigo);
                        $("#nombre").val(obj.nombre);
                        $("#talla").val(obj.talla);
                        $("#cantidad").val(obj.cantidad);
                        $("#precio").val(obj.precio);

                    });
                }
            })
        },
        limpiar: function(){
            $("#codigo").val("");
            $("#nombre").val("");
            $("#talla").val("");
            $("#cantidad").val("");
            $("#precio").val("");
        }
    }
}();
