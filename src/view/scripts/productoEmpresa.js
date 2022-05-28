var productoEmpresa = function () {

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
                    // { "title": "Estado", "data": "estado" },
                    {
                        "title": "Acciones", "defaultContent": "<button type='button' class='editar btn btn-outline-primary btn-sm' data-bs-toggle='modal' data-bs-target='#agregarProducto' ><span class='fa-fw select-all fas'></span></button>"
                            + "<button class='eliminar btn btn-outline-danger btn-sm' ><span class='fa-fw select-all fas'></span></button>"
                            + "<button class='restablecer btn btn-outline-success btn-sm' ><span class='fa-solid fa-circle-check'></span></button>"
                    }],
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
                },
                // "responsive": "true",
                // "dom": "Bfrtilp",

            });
            productoEmpresa.obtener_data_editar("#example tbody", table);
            productoEmpresa.obtener_data_eliminar("#example tbody", table);
            productoEmpresa.obtener_data_restaurar("#example tbody", table);


        },

        obtener_data_editar: function (tbody, table) {
            $(tbody).on("click", "button.editar", function () {
                var data = table.row($(this).parents("tr")).data();
                console.log(data);
                productoEmpresa.obtenerPorId(data.id);
            });
        },
        obtener_data_eliminar: function (tbody, table) {
            $(tbody).on("click", "button.eliminar", function () {
                var data = table.row($(this).parents("tr")).data();
                console.log(data);
                productoEmpresa.eliminarProducto(data.id, 0);
            });
        },

        obtener_data_restaurar: function (tbody, table) {
            $(tbody).on("click", "button.restablecer", function () {
                var data = table.row($(this).parents("tr")).data();
                console.log(data);
                productoEmpresa.eliminarProducto(data.id, 1);
            });
        },

        guardarProducto: function () {
            var codigo = $("#codigo").val();
            var nombre = $("#nombre").val();
            var talla = $("#talla").val();
            var cantidad = $("#cantidad").val();
            var precio = $("#precio").val();
            var idArea = $("#idarea").val();
            var idProducto = $("#idproducto").val();
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
                    idArea: idArea,
                    idProducto: idProducto
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
                            productoEmpresa.obtenerListaProductos();
                            productoEmpresa.limpiar();
                            $('#agregarProducto').modal('hide');

                        }

                    });

                }
            });

        },
        eliminarProducto: function (id,estado) {
            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/Producto/eliminarProducto.php',
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
                        productoEmpresa.obtenerListaProductos();
                    });
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
                    precio: precio,

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
                            productoEmpresa.obtenerListaProductos();
                            productoEmpresa.limpiar();
                            $('#agregarProducto').modal('hide');

                        }

                    });

                }
            });

        },
        obtenerPorId: function (id) {


            var btn_2 = document.getElementById('editar');
            var btn_1 = document.getElementById('guardar');
            btn_2.style.display = 'inline';
            btn_1.style.display = 'none';
            document.getElementById("codigo").disabled = true;
            document.getElementById("idarea").disabled = true;
            document.getElementById("idproducto").disabled = true;

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

                        if (obj.estado == 1) {

                            document.getElementById("estadoC").innerHTML = "Activo";
                            document.getElementById("estadoC").style.backgroundColor = "#2ecc71";
                        } else {
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
            $("#talla").val("");
            $("#cantidad").val("");
            $("#precio").val("");
            document.getElementById("estadoC").innerHTML = "";
            document.getElementById("estadoC").style.backgroundColor = "transparent";
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
                            area = '<option class="text-blue" value="' + obj.id + '">' + obj.nombre + '</option>';


                        } else {
                            area = '<option disabled  class="text-pink" value="' + obj.id + '">' + obj.nombre + '</option>';

                        }
                        $("#idarea").append(area);
                    });
                }
            })

        },
        obtenerListaProductoG: function () {
            $.ajax({
                url: "http://localhost:8080/Grissy/controllers/ProductoG/obtenerListaProductoG.php",
                method: "GET",
                timeout: 0,
                success: function (response) {

                    console.log(response);

                    var objListado = JSON.parse(response);
                    $(objListado).each(function (i, obj) {
                        var area = '';
                        if (obj.estado == 1) {
                            area = '<option class="text-blue" value="' + obj.id + '">' + obj.nombre + '</option>';
                        } else {
                            area = '<option disabled class="text-pink" value="' + obj.id + '">' + obj.nombre + '</option>';
                        }
                        $("#idproducto").append(area);
                    });
                }
            })

        },
        en_guardar: function () {
            document.getElementById("idarea").disabled = false;
            document.getElementById("idproducto").disabled = false;
            document.getElementById("codigo").disabled = false;
            var btn_2 = document.getElementById('editar');
            var btn_1 = document.getElementById('guardar');
            btn_2.style.display = 'none';
            btn_1.style.display = 'inline';
            this.limpiar();

        }

    }
}();
