var ingresoCaja = function () {

    return {
        en_guardar: function () {
            var btn_2 = document.getElementById('editar');
            var btn_1 = document.getElementById('guardar');
            var checkss = document.getElementById('checkss');
            document.getElementById("codigo").disabled = true;

            btn_2.style.display = 'none';
            btn_1.style.display = 'inline';
            checkss.style.display = 'inline';

            this.limpiar();
        },

        guardarIngresoCaja: function () {

            var montos = $("#monto").val();
            var codigo = $("#codigo").val();

            var tipo;
            const radios = document.getElementsByName('tipo');
            console.log(radios);
            for (var i = 0; i < radios.length; i++) {
                if (radios[i].checked) {
                    if (radios[i].value == "efectivo") {
                        tipo = 0
                    }
                    if (radios[i].value == "compra") {
                        tipo = 1
                    }
                    if (radios[i].value == "servicio") {
                        tipo = 2
                    }
                    break;
                }

            }

            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/IngresoCaja/guardarIngresoCaja.php',
                method: "POST",
                data: {
                    monto: montos,
                    tipo: tipo,
                    codigo: codigo
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
                            ingresoCaja.obtenerListaIngresoCaja();
                            ingresoCaja.limpiar();
                            $('#agregarArea').modal('hide');
                        }
                    })
                }
            });

        },

        obtenerListaIngresoCaja: function () {
            $('#example').DataTable().destroy();
            $('#example').empty();
            var table = $('#example').DataTable({
                "ajax": {
                    "method": "GET",
                    "url": "http://localhost:8080/Grissy/controllers/IngresoCaja/obtenerListaIngresoCaja.php",
                    "dataSrc": ""
                },
                "columns": [
                    { "title": "Codigo", "data": "codigo" },
                    { "title": "Fecha", "data": "fecha" },
                    { "title": "Monto", "data": "monto" },
                    { "title": "Tipo", "data": "nombreTipo" },
                    {
                        "title": "Acciones", "defaultContent": "<button type='button' class='editar btn btn-outline-primary btn-sm' data-bs-toggle='modal' data-bs-target='#agregarArea' ><i class='fa-solid fa-pen-to-square'></i></button>"
                            + "<button class='eliminar btn btn-outline-warning btn-sm' ><i class='fa-solid fa-circle-minus'></i></button>"
                            + "<button class='restablecer btn btn-outline-success btn-sm' ><i class='fa-solid fa-circle-check'></i></button>"
                            + "<button class='exterminar btn btn-outline-danger btn-sm' ><i class='fa-solid fa-trash-can'></i></button>"
                    }
                ],
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
                },
                // "responsive": "true",
                // "dom": "Bfrtilp",<i class="fa-solid fa-trash-can"></i>


            });
            ingresoCaja.obtener_data_editar("#example tbody", table);
            ingresoCaja.obtener_data_eliminar("#example tbody", table);
            ingresoCaja.obtener_data_restaurar("#example tbody", table);
            ingresoCaja.obtener_data_deletDefinitivo("#example tbody", table);
        },

        obtener_data_deletDefinitivo: function (tbody, table) {
            $(tbody).on("click", "button.exterminar", function () {
                var data = table.row($(this).parents("tr")).data();
                console.log(data);
                ingresoCaja.delectIngresoCaja(data.id);
            });
        },

        delectIngresoCaja: function (id) {
            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/IngresoCaja/delectIngresoCaja.php',
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
                        ingresoCaja.obtenerListaIngresoCaja();
                    });

                }
            });
        },

        obtener_data_editar: function (tbody, table) {
            $(tbody).on("click", "button.editar", function () {
                var data = table.row($(this).parents("tr")).data();
                console.log(data);
                ingresoCaja.obtenerPorId(data.id);
            });
        },

        obtenerPorId: function (id) {
            var btn_2 = document.getElementById('editar');
            var btn_1 = document.getElementById('guardar');
            var checkss = document.getElementById('checkss');
            btn_2.style.display = 'inline';
            btn_1.style.display = 'none';
            checkss.style.display = 'none';
            document.getElementById("codigo").disabled = false;

            $.ajax({
                url: "http://localhost:8080/Grissy/controllers/IngresoCaja/buscarIngresoCajaPorId.php",
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
                        $("#monto").val(obj.monto);
                        if (obj.estado == 1) {
                            document.getElementById("editar").style.display = 'inline';
                            document.getElementById("estadoC").innerHTML = "Activo";
                            document.getElementById("estadoC").style.backgroundColor = "#2ecc71";
                        } else {
                            document.getElementById("editar").style.display = 'none';
                            document.getElementById("estadoC").innerHTML = "Inactivo";
                            document.getElementById("estadoC").style.backgroundColor = "#cc2e2e";

                        }
                    });
                }
            })
        },

        editarIngresoCaja: function () {
            var monto = $("#monto").val();
            var codigo = $("#codigo").val();

            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/IngresoCaja/editarIngresoCaja.php',
                method: "POST",
                data: {
                    monto: monto,
                    codigo: codigo,
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
                            ingresoCaja.obtenerListaIngresoCaja();
                            ingresoCaja.limpiar();
                            $('#agregarArea').modal('hide');

                        }

                    });
                }
            });

        },

        obtener_data_eliminar: function (tbody, table) {
            $(tbody).on("click", "button.eliminar", function () {
                var data = table.row($(this).parents("tr")).data();
                console.log(data);
                ingresoCaja.eliminarIngresoCaja(data.id, 0);
            });
        },

        obtener_data_restaurar: function (tbody, table) {
            $(tbody).on("click", "button.restablecer", function () {
                var data = table.row($(this).parents("tr")).data();
                console.log(data);
                ingresoCaja.eliminarIngresoCaja(data.id, 1);
            });
        },


        eliminarIngresoCaja: function (id, estado) {
            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/IngresoCaja/eliminarIngresoCaja.php',
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
                        ingresoCaja.obtenerListaIngresoCaja();
                    });

                }
            });
        },

        limpiar: function () {
            $("#codigo").val("");
            $("#monto").val("");
            document.getElementById("codigo").disabled = false;
            document.getElementById("estadoC").innerHTML = "";
            document.getElementById("estadoC").style.backgroundColor = "transparent";

        }


    }
}();