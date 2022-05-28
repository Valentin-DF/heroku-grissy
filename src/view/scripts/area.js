var area = function () {

    return {
        en_guardar: function () {
            var btn_2 = document.getElementById('editar');
            var btn_1 = document.getElementById('guardar');
            btn_2.style.display = 'none';
            btn_1.style.display = 'inline';
            this.limpiar();
        },

        guardarArea: function () {

            var codigo = $("#codigo").val();
            var nombre = $("#nombre").val();
            var foto = $("#foto").val();
            var descripcion = $("#descripcion").val();

            if ($("#foto").val() == "") {
                var foto = "http://localhost:8080/Grissy/src/assets/img/ES_121355.gif";
            }
            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/Area/guardarArea.php',
                method: "POST",
                data: {
                    codigo: codigo,
                    nombre: nombre,
                    descripcion: descripcion,
                    foto: foto
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
                            area.obtenerListaArea();
                            area.limpiar();
                            $('#agregarArea').modal('hide');
                        }
                    })
                }
            });

        },




        obtenerListaArea: function () {
            $('#example').DataTable().destroy();
            $('#example').empty();
            var table = $('#example').DataTable({
                "ajax": {
                    "method": "GET",
                    "url": "http://localhost:8080/Grissy/controllers/Area/obtenerListaArea.php",
                    "dataSrc": ""
                },
                "columns": [
                    { "title": "Codigo", "data": "codigo" },
                    { "title": "Nombre", "data": "nombre" },
                    { "title": "Descripcion", "data": "descripcion" },
                    {
                        "title": "Acciones", "defaultContent": "<button type='button' class='editar btn btn-outline-primary btn-sm' data-bs-toggle='modal' data-bs-target='#agregarArea' ><span class='fa-fw select-all fas'></span></button>"
                            + "<button class='eliminar btn btn-outline-danger btn-sm' ><span class='fa-fw select-all fas'></span></button>"
                            + "<button class='restablecer btn btn-outline-success btn-sm' ><span class='fa-solid fa-circle-check'></span></button>"
                    }
                ],
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
                },
                // "responsive": "true",
                // "dom": "Bfrtilp",


            });
            area.obtener_data_editar("#example tbody", table);
            area.obtener_data_eliminar("#example tbody", table);
            area.obtener_data_restaurar("#example tbody", table);
        },


        obtener_data_editar: function (tbody, table) {
            $(tbody).on("click", "button.editar", function () {
                var data = table.row($(this).parents("tr")).data();
                console.log(data);
                area.obtenerPorId(data.id);
            });
        },

        obtenerPorId: function (id) {
            document.getElementById("codigo").disabled = true;
            var btn_2 = document.getElementById('editar');
            var btn_1 = document.getElementById('guardar');
            btn_2.style.display = 'inline';
            btn_1.style.display = 'none';

            $.ajax({
                url: "http://localhost:8080/Grissy/controllers/Area/buscarAreaPorId.php",
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
                        $("#foto").val(obj.foto);
                        $("#descripcion").val(obj.descripcion);
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

        editarArea: function () {
            var codigo = $("#codigo").val();
            var nombre = $("#nombre").val();
            var foto = $("#foto").val();
            var descripcion = $("#descripcion").val();
            if ($("#foto").val() == "") {
                var foto = "http://localhost:8080/Grissy/src/assets/img/ES_121355.gif";
            }

            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/Area/editarArea.php',
                method: "POST",
                data: {
                    codigo: codigo,
                    nombre: nombre,
                    descripcion: descripcion,
                    foto: foto
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
                            area.obtenerListaArea();
                            area.limpiar();
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
                area.eliminarArea(data.id, 0);
            });
        },

        obtener_data_restaurar: function (tbody, table) {
            $(tbody).on("click", "button.restablecer", function () {
                var data = table.row($(this).parents("tr")).data();
                console.log(data);
                area.eliminarArea(data.id, 1);
            });
        },


        eliminarArea: function (id,estado) {
            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/Area/eliminarArea.php',
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
                        area.obtenerListaArea();
                    });

                }
            });
        },

        limpiar: function () {
            $("#codigo").val("");
            $("#nombre").val("");
            $("#foto").val("");
            $("#descripcion").val("");
            document.getElementById("codigo").disabled = false;
            document.getElementById("estadoC").innerHTML = "";
            document.getElementById("estadoC").style.backgroundColor = "transparent";

        }


    }
}();