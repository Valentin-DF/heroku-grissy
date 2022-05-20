var producto = function () {

    return {
        obtenerListaProductos: function () {
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
                    { "title": "Cantidad", "data": "cantidad" },
                    { "title": "Precio", "data": "precio" },
                    { "title": "Talla", "data": "talla" },
                    { "title": "Estado", "data": "estado" },
                    { "title": "Acciones", "defaultContent": "<button type='button' class='editar btn btn-outline-primary' data-bs-toggle='modal' data-bs-target='#agregarProducto' ><span class='fa-fw select-all fas'></span></button><button class='eliminar btn btn-outline-danger' ><span class='fa-fw select-all fas'></span></button>" }
                ],
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
                },
                "responsive": "true",
                "dom": "Bfrtilp",

            });
            this.obtener_data_editar("#example tbody", table);
            this.obtener_data_eliminar("#example tbody", table);

        },

        obtener_data_editar: function (tbody, table) {
            $(tbody).on("click", "button.editar", function () {
                var data = table.row($(this).parents("tr")).data();
                console.log(data);
                producto.obtenerPorId(data.id);
            });
        },
        obtener_data_eliminar: function (tbody, table) {
            $(tbody).on("click", "button.eliminar", function () {
                var data = table.row($(this).parents("tr")).data();
                console.log(data);
                producto.eliminarProducto(data.id);
            });
        },

        guardarProducto: function () {
            var codigo = $("#codigo").val();
            var nombre = $("#nombre").val();
            var talla = $("#talla").val();
            var cantidad = $("#cantidad").val();
            var precio = $("#precio").val();
            var idArea = $("#idarea").val();
            var estado = 1;
            if ($("#codigo").val() != "") {
                if ($("#nombre").val() != "") {
                    if ($("#cantidad").val() != "" && parseInt($("#cantidad").val()) > 0) {
                        if ($("#precio").val() != "" && parsefloat($("#precio").val()) > 0) {

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
                                    producto.obtenerListaProductos();
                                    producto.limpiar();
                                }
                            });
                            $('#agregarCliente').modal('hide');
                        } else {
                            Toastify({
                                text: "Se debe ingregsar un precio al producto",
                                duration: 3000,
                                close: true,
                                backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                            }).showToast();
                        }
                    } else {
                        Toastify({
                            text: "Se debe ingregsar una cantidad validad",
                            duration: 3000,
                            close: true,
                            backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                        }).showToast();
                    }
                } else {
                    Toastify({
                        text: "Se debe registrar un nombre como referencia",
                        duration: 3000,
                        close: true,
                        backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                    }).showToast();
                }
            } else {
                Toastify({
                    text: "No cuenta con un codigo",
                    duration: 3000,
                    close: true,
                    backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                }).showToast();
            }
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
            if ($("#codigo").val() != "") {
                if ($("#nombre").val() != "") {
                    if ($("#cantidad").val() != "" && parseInt($("#cantidad").val()) > 0) {
                        if ($("#precio").val() != "" && parsefloat($("#precio").val()) > 0) {

                            $.ajax({
                                url: 'http://localhost:8080/Grissy/controllers/Producto/editarProducto.php',
                                method: "POST",
                                data: {
                                    codigo: codigo,
                                    nombre: nombre,
                                    talla: talla,
                                    cantidad: cantidad,
                                    precio: precio,

                                },
                                complete: function (response) {
                                    console.log(response);
                                    producto.obtenerListaProductos();
                                    producto.limpiar();
                                }
                            });
                            $('#agregarCliente').modal('hide');
                        } else {
                            Toastify({
                                text: "Se debe ingregsar un precio al producto",
                                duration: 3000,
                                close: true,
                                backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                            }).showToast();
                        }
                    } else {
                        Toastify({
                            text: "Se debe ingregsar una cantidad validad",
                            duration: 3000,
                            close: true,
                            backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                        }).showToast();
                    }
                } else {
                    Toastify({
                        text: "Se debe registrar un nombre como referencia",
                        duration: 3000,
                        close: true,
                        backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                    }).showToast();
                }
            } else {
                Toastify({
                    text: "No cuenta con un codigo",
                    duration: 3000,
                    close: true,
                    backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                }).showToast();
            }
        },
        obtenerPorId: function (id) {


            var btn_2 = document.getElementById('editar');
            var btn_1 = document.getElementById('guardar');
            btn_2.style.display = 'inline';
            btn_1.style.display = 'none';
            document.getElementById("codigo").disabled = true;
            document.getElementById("idarea").disabled = true;
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
                        $("#idarea").val(obj.idarea);
                    });
                }
            })
        },
        limpiar: function () {
            $("#codigo").val("");
            $("#nombre").val("");
            $("#talla").val("");
            $("#cantidad").val("");
            $("#precio").val("");
        },
        obtenerListaArea: function () {
            $.ajax({
                url: "http://localhost:8080/Grissy/controllers/Area/obtenerListaArea.php",
                method: "GET",
                timeout: 0,
                success: function (response) {

                    console.log(response);

                    var objListado = JSON.parse(response);
                    $(objListado).each(function (i, obj) {
                        var area = '';
                        if (obj.estado == 1) {
                            area = '<option value="' + obj.id + '">' + obj.nombre + '</option>';

                            $("#idarea").append(area);
                        }

                    });
                }
            })

        },
        en_guardar: function () {
            document.getElementById("idarea").disabled = false;
            document.getElementById("codigo").disabled = false;
            var btn_2 = document.getElementById('editar');
            var btn_1 = document.getElementById('guardar');
            btn_2.style.display = 'none';
            btn_1.style.display = 'inline';
        }

    }
}();
