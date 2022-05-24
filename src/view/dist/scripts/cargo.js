
var cargo = function () {

    return {
        en_guardar: function () {
            document.getElementById("codigo").disabled = false;
            var btn_2 = document.getElementById('editar');
            var btn_1 = document.getElementById('guardar');
            btn_2.style.display = 'none';
            btn_1.style.display = 'inline';
            this.limpiar();

        },

        guardarCargo: function () {

            var codigo = $("#codigo").val();
            var nombre = $("#nombre").val();
            if ($('#secundario').prop("checked") == true) {
                var secundario = 1;
            } else {
                var secundario = 0;
            }
            if ($('#principal').prop("checked") == true) {
                var principal = 1;
            } else {
                var principal = 0;
            }



            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/Cargo/guardarCargo.php',
                method: "POST",
                data: {
                    codigo: codigo,
                    nombre: nombre,
                    secundario: secundario,
                    principal: principal
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
                            cargo.obtenerListaCargo();
                            cargo.limpiar();
                            $('#agregarCargo').modal('hide');

                        }

                    });
                }
            });

        },

        obtenerListaCargo: function () {
            $('#example').DataTable().destroy();
            $('#example').empty();
            var table = $('#example').DataTable({
                "ajax": {
                    "method": "GET",
                    "url": "http://localhost:8080/Grissy/controllers/Cargo/obtenerlistaCargo.php",
                    "dataSrc": ""
                },
                "columns": [
                    { "title": "Codigo", "data": "codigo" },
                    { "title": "Nombre", "data": "nombre" },
                    { "title": "Principal", "data": "nombrePrincipal" },
                    { "title": "Secundario", "data": "nombreSecundario" },
                    {
                        "title": "Acciones", "defaultContent": "<button type='button' class='editar btn btn-outline-primary btn-sm' data-bs-toggle='modal' data-bs-target='#agregarCargo' ><span class='fa-fw select-all fas'></span></button>"
                            + "<button class='eliminar btn btn-outline-danger btn-sm' ><span class='fa-fw select-all fas'></span></button>"
                            + "<button class='restablecer btn btn-outline-success btn-sm' ><span class='fa-solid fa-circle-check'></span></button>"
                    }
                ],
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
                },
                "responsive": "true",



            });
            cargo.obtener_data_editar("#example tbody", table);
            cargo.obtener_data_eliminar("#example tbody", table);
            cargo.obtener_data_restaurar("#example tbody", table);
        },

        obtener_data_editar: function (tbody, table) {
            $(tbody).on("click", "button.editar", function () {
                var data = table.row($(this).parents("tr")).data();
                console.log(data);
                cargo.obtenerPorId(data.id);
            });
        },

        obtenerPorId: function (id) {
            document.getElementById("codigo").disabled = true;
            var btn_2 = document.getElementById('editar');
            var btn_1 = document.getElementById('guardar');
            btn_2.style.display = 'inline';
            btn_1.style.display = 'none';
            $.ajax({
                url: "http://localhost:8080/Grissy/controllers/Cargo/buscarCargoPorId.php",
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
                        $('#secundario').prop("checked", obj.secundario);
                        $('#principal').prop("checked", obj.principal);
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


        editarCargo: function () {

            var codigo = $("#codigo").val();
            var nombre = $("#nombre").val();
            if ($('#secundario').prop("checked") == true) {
                var secundario = 1;
            } else {
                var secundario = 0;
            }
            if ($('#principal').prop("checked") == true) {
                var principal = 1;
            } else {
                var principal = 0;
            }

            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/Cargo/editarCargo.php',
                method: "POST",
                data: {
                    codigo: codigo,
                    nombre: nombre,
                    secundario: secundario,
                    principal: principal

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
                            cargo.obtenerListaCargo();
                            cargo.limpiar();
                            $('#agregarCargo').modal('hide');

                        }

                    });

                }
            });


        },

        obtener_data_eliminar: function (tbody, table) {
            $(tbody).on("click", "button.eliminar", function () {
                var data = table.row($(this).parents("tr")).data();
                console.log(data);
                cargo.eliminarCargo(data.id, 0);
            });
        },

        obtener_data_restaurar: function (tbody, table) {
            $(tbody).on("click", "button.restablecer", function () {
                var data = table.row($(this).parents("tr")).data();
                console.log(data);
                cargo.eliminarCargo(data.id, 1);
            });
        },

        eliminarCargo: function (id, estado) {
            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/Cargo/eliminarCargo.php',
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
                        cargo.obtenerListaCargo();
                    });

                }
            });
        },

        limpiar: function () {

            $("#codigo").val("");
            $("#nombre").val("");
            document.getElementById("estadoC").innerHTML = "";
            document.getElementById("estadoC").style.backgroundColor = "transparent";
        },

    }
}();