var productoGeneral = function () {

    return {
        obtenerListaProductos: function () {
            $('#example').DataTable().destroy();
            $('#example').empty();
            var table = $('#example').DataTable({
                "ajax": {
                    "method": "GET",
                    "url": "http://localhost:8080/Grissy/controllers/ProductoG/obtenerListaProductoG.php",
                    "dataSrc": ""
                },
                "columns": [
                    { "title": "Codigo", "data": "codigo" },
                    { "title": "Nombre", "data": "nombre" },
                    {
                        "title": "Acciones", "defaultContent": "<button type='button' class='editar btn btn-outline-primary btn-sm' data-bs-toggle='modal' data-bs-target='#agregarProducto' ><i class='fa-solid fa-pen-to-square'></i></button>"
                            + "<button class='eliminar btn btn-outline-warning btn-sm' ><i class='fa-solid fa-circle-minus'></i></button>"
                            + "<button class='restablecer btn btn-outline-success btn-sm' ><i class='fa-solid fa-circle-check'></i></button>"
                            + "<button class='exterminar btn btn-outline-danger btn-sm' ><i class='fa-solid fa-trash-can'></i></button>"
                    }
                ],
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
                },
                // "responsive": "true",
                // "dom": "Bfrtilp",

            });
            productoGeneral.obtener_data_editar("#example tbody", table);
            productoGeneral.obtener_data_eliminar("#example tbody", table);
            productoGeneral.obtener_data_restaurar("#example tbody", table);
            productoGeneral.obtener_data_deletDefinitivo("#example tbody", table);

        },

        obtener_data_deletDefinitivo: function (tbody, table) {
            $(tbody).on("click", "button.exterminar", function () {
                var data = table.row($(this).parents("tr")).data();
                console.log(data);
                productoGeneral.delectProducto(data.id);
            });
        },

        delectProducto: function (id) {
            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/ProductoG/delectProductoG.php',
                method: "POST",
                data: {
                    id: id
                },
                success: function (response) {
                    console.log(response);
                    var objListado = JSON.parse(response);
                    $(objListado).each(function (i, obj) {
                        Toastify({
                            text: obj.msj,
                            duration: 3000,
                            close: true,
                            backgroundColor: obj.color,
                        }).showToast();
                        productoGeneral.obtenerListaProductos();
                    });

                }
            });
        },

        obtener_data_editar: function (tbody, table) {
            $(tbody).on("click", "button.editar", function () {
                var data = table.row($(this).parents("tr")).data();
                console.log(data);
                productoGeneral.obtenerPorId(data.id);
            });
        },
        
        obtener_data_eliminar: function (tbody, table) {
            $(tbody).on("click", "button.eliminar", function () {
                var data = table.row($(this).parents("tr")).data();
                console.log(data);
                productoGeneral.eliminarProducto(data.id, 0);
            });
        },

        obtener_data_restaurar: function (tbody, table) {
            $(tbody).on("click", "button.restablecer", function () {
                var data = table.row($(this).parents("tr")).data();
                console.log(data);
                productoGeneral.eliminarProducto(data.id, 1);
            });
        },

        guardarProducto: function () {
            var codigo = $("#codigo").val();
            var nombre = $("#nombre").val();

            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/ProductoG/guardarProductoG.php',
                method: "POST",
                data: {
                    codigo: codigo,
                    nombre: nombre
                },
                success: function (response) {

                    console.log(response);
                    var objListado = JSON.parse(response);
                    $(objListado).each(function (i, obj) {
                        Toastify({
                            text: obj.msj,
                            duration: 3000,
                            close: true,
                            backgroundColor: obj.color,
                        }).showToast();
                        if (obj.warning == "true") {
                            productoGeneral.obtenerListaProductos();
                            productoGeneral.limpiar();
                            $('#agregarProducto').modal('hide');

                        }

                    });

                }
            });

        },

        eliminarProducto: function (id,estado) {
            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/ProductoG/eliminarProductoG.php',
                method: "POST",
                data: {
                    id: id,
                    estado: estado
                },
                success: function (response) {
                    console.log(response);
                    var objListado = JSON.parse(response);
                    $(objListado).each(function (i, obj) {
                        Toastify({
                            text: obj.msj,
                            duration: 3000,
                            close: true,
                            backgroundColor: obj.color,
                        }).showToast();
                        productoGeneral.obtenerListaProductos();
                    });
                }
            });
        },

        editarProducto: function () {
            var codigo = $("#codigo").val();
            var nombre = $("#nombre").val();

            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/ProductoG/editarProductoG.php',
                method: "POST",
                data: {
                    codigo: codigo,
                    nombre: nombre
                },
                success: function (response) {

                    console.log(response);
                    var objListado = JSON.parse(response);
                    $(objListado).each(function (i, obj) {
                        Toastify({
                            text: obj.msj,
                            duration: 3000,
                            close: true,
                            backgroundColor: obj.color,
                        }).showToast();
                        if (obj.warning == "true") {
                            productoGeneral.obtenerListaProductos();
                            productoGeneral.limpiar();
                            $('#agregarProducto').modal('hide');

                        }

                    });

                }
            });

        },

        obtenerPorId: function (id) {

            document.getElementById("codigo").disabled = true;
            var btn_2 = document.getElementById('editar');
            var btn_1 = document.getElementById('guardar');
            btn_2.style.display = 'inline';
            btn_1.style.display = 'none';

            $.ajax({
                url: "http://localhost:8080/Grissy/controllers/ProductoG/buscarProductoGPorId.php",
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

                        if (obj.estado == 1) {
                            document.getElementById("editar").style.display  = 'inline';
                            document.getElementById("estadoC").innerHTML = "Activo";
                            document.getElementById("estadoC").style.backgroundColor = "#2ecc71";
                        } else {
                            document.getElementById("editar").style.display  = 'none';
                            document.getElementById("estadoC").innerHTML = "Inactivo";
                            document.getElementById("estadoC").style.backgroundColor = "#cc2e2e";

                        }

                    });
                }
            })
        },

        limpiar: function () {
            $("#codigo").val("");
            $("#nombre").val("");
            document.getElementById("estadoC").innerHTML = "";
            document.getElementById("estadoC").style.backgroundColor = "transparent";
        },  

        en_guardar: function () {
            document.getElementById("codigo").disabled = false;
            var btn_2 = document.getElementById('editar');
            var btn_1 = document.getElementById('guardar');
            btn_2.style.display = 'none';
            btn_1.style.display = 'inline';
            this.limpiar();

        }

    }
}();
