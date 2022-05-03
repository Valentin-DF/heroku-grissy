var cliente = function () {

    return {
        consultarDNI: function () {
            var docIdentidad = $("#docIdentidad").val();

            $.ajax({
                url: 'https://dniruc.apisperu.com/api/v1/dni/' + docIdentidad,
                method: "GET",
                data: {
                    token: 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImVzcGlub3phdmlsbGFyQGdtYWlsLmNvbSJ9._ZzB3eoj0J1OPDMRYGdeziwiEtoJSejb3ruXOgJPlEA'
                },
                complete: function (response) {
                    console.log(response.responseJSON);
                    $("#codigo").val("D-" + response.responseJSON.dni);
                    $("#nombre").val(response.responseJSON.nombres);
                    $("#apellidoPaterno").val(response.responseJSON.apellidoPaterno);
                    $("#apellidoMaterno").val(response.responseJSON.apellidoMaterno);

                }
            });
        },
        consultarRUC: function () {
            var doc = $("#docIdentidad").val();

            $.ajax({
                url: 'https://dniruc.apisperu.com/api/v1/ruc/' + doc,
                method: "GET",
                data: {
                    token: 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImVzcGlub3phdmlsbGFyQGdtYWlsLmNvbSJ9._ZzB3eoj0J1OPDMRYGdeziwiEtoJSejb3ruXOgJPlEA'
                },
                complete: function (response) {
                    console.log(response.responseJSON);
                    $("#codigo").val("R-" + response.responseJSON.ruc);
                    $("#nombre").val(response.responseJSON.razonSocial);
                    $("#condicionSunat").val(response.responseJSON.condicion);
                    $("#estadoSunat").val(response.responseJSON.estado);
                    $("#direccion").val(response.responseJSON.direccion);
                }
            });
        },
        obtenerListaCliente: function () {

            var table = $('#example').DataTable({
                "ajax": {
                    "method": "GET",
                    "url": "http://localhost:8080/Grissy/controllers/Cliente/obtenerListaClientes.php",
                    "dataSrc": ""
                },
                "columns": [
                    { "data": "codigo" },
                    { "data": "docIdentidad" },
                    { "data": "nombre" },
                    { "data": "apellidoPaterno" },
                    { "data": "apellidoMaterno" },
                    { "data": "fechaRegistro" },
                    { "data": "estado" },
                    { "defaultContent": "<button type='button' class='editar btn btn-outline-primary' data-bs-toggle='modal' data-bs-target='#agregarCliente' ><span class='fa-fw select-all fas'></span></button><button class='eliminar btn btn-outline-danger' ><span class='fa-fw select-all fas'></span></button>" }
                ],

            });
            this.obtener_data_editar("#example tbody", table);
            this.obtener_data_eliminar("#example tbody", table);
        },

        obtener_data_editar: function (tbody, table) {
            $(tbody).on("click", "button.editar", function () {
                var data = table.row($(this).parents("tr")).data();
                console.log(data);
                cliente.obtenerPorId(data.id);
            });
        },
        obtener_data_eliminar: function (tbody, table) {
            $(tbody).on("click", "button.eliminar", function () {
                var data = table.row($(this).parents("tr")).data();
                console.log(data);
                cliente.eliminarCliente(data.id);
                cliente.obtenerListaCliente();
            });
        },

        guardarCliente: function () {
            var apellidoPaterno = $("#apellidoPaterno").val();
            var apellidoMaterno = $("#apellidoMaterno").val();
            var codigo = $("#codigo").val();
            var condicionSunat = $("#condicionSunat").val();
            var direccion = $("#direccion").val();
            var docIdentidad = $("#docIdentidad").val();
            var estadoSunat = $("#estadoSunat").val();
            var nombre = $("#nombre").val();
            var telefono = $("#telefono").val();

            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/Cliente/guardarCliente.php',
                method: "POST",
                data: {
                    codigo: codigo,
                    nombre: nombre,
                    apellidoMaterno: apellidoMaterno,
                    apellidoPaterno: apellidoPaterno,
                    condicionSunat: condicionSunat,
                    direccion: direccion,
                    docIdentidad: docIdentidad,
                    estadoSunat: estadoSunat,
                    telefono: telefono
                },
                complete: function (response) {
                    console.log(response);
                    // $("#lst-cliente").empty();
                    cliente.obtenerListaCliente();
                    cliente.limpiar();

                }
            });
        },
        eliminarCliente: function (id) {
            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/Cliente/eliminarCliente.php',
                method: "POST",
                data: {
                    id: id
                },
                complete: function (response) {
                    console.log(response);
                    // $("#lst-cliente").empty();
                    cliente.obtenerListaCliente();
                }
            });
        },
        editarCliente: function () {
            var apellidoPaterno = $("#apellidoPaterno").val();
            var apellidoMaterno = $("#apellidoMaterno").val();
            var codigo = $("#codigo").val();
            var condicionSunat = $("#condicionSunat").val();
            var direccion = $("#direccion").val();
            var docIdentidad = $("#docIdentidad").val();
            var estadoSunat = $("#estadoSunat").val();
            var nombre = $("#nombre").val();
            var telefono = $("#telefono").val();

            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/Cliente/editarCliente.php',
                method: "POST",
                data: {
                    codigo: codigo,
                    nombre: nombre,
                    apellidoMaterno: apellidoMaterno,
                    apellidoPaterno: apellidoPaterno,
                    condicionSunat: condicionSunat,
                    direccion: direccion,
                    docIdentidad: docIdentidad,
                    estadoSunat: estadoSunat,
                    telefono: telefono
                },
                complete: function (response) {
                    console.log(response);
                    // $("#lst-cliente").empty();
                    cliente.obtenerListaCliente();
                    cliente.limpiar();
                }
            });
        },
        obtenerPorId: function (id) {
            document.getElementById("dni").style.display = 'none';
            document.getElementById("ruc").style.display = 'none';
            var btn_2 = document.getElementById('editar');
            var btn_1 = document.getElementById('guardar');
            btn_2.style.display = 'inline';
            btn_1.style.display = 'none';
            $.ajax({
                url: "http://localhost:8080/Grissy/controllers/Cliente/buscarClientePorId.php",
                method: "GET",
                data: {
                    id: id
                },
                timeout: 0,
                success: function (response) {

                    console.log(response);

                    var objListado = JSON.parse(response);
                    $(objListado).each(function (i, obj) {

                        $("#apellidoPaterno").val(obj.apellidoPaterno);
                        $("#apellidoMaterno").val(obj.apellidoMaterno);
                        $("#codigo").val(obj.codigo);
                        $("#condicionSunat").val(obj.condicionSunat);
                        $("#direccion").val(obj.direccion);
                        $("#docIdentidad").val(obj.docIdentidad);
                        $("#estadoSunat").val(obj.estadoSunat);
                        $("#nombre").val(obj.nombre);
                        $("#telefono").val(obj.telefono);

                    });
                }
            })
        },
        limpiar: function () {
            $("#apellidoPaterno").val("");
            $("#apellidoMaterno").val("");
            $("#codigo").val("");
            $("#condicionSunat").val("");
            $("#direccion").val("");
            $("#docIdentidad").val("");
            $("#estadoSunat").val("");
            $("#nombre").val("");
            $("#telefono").val("");
        },
        en_guardar: function () {
            document.getElementById("dni").style.display = 'inline';
            document.getElementById("ruc").style.display = 'inline';
            var btn_2 = document.getElementById('editar');
            var btn_1 = document.getElementById('guardar');
            btn_2.style.display = 'none';
            btn_1.style.display = 'inline';
            this.limpiar();
        },
        consultarDocIdentidad: function () {

            const radios = document.getElementsByName('esDocumento');
            console.log(radios);
            for (var i = 0; i < radios.length; i++) {
                if (radios[i].checked) {
                    if (radios[i].value == "dni") {
                        // console.log("dni: ", doc);
                        // if (doc.length == 8) {
                        this.consultarDNI();

                    }
                    if (radios[i].value == "ruc") {
                        // console.log("ruc: ", doc);
                        // if (doc.length == 11) {
                        this.consultarRUC();
                        // }
                    }
                    break;
                }
            }
        },
        oninputDni_Ruc: function () {

            const radios = document.getElementsByName('esDocumento');
            console.log(radios);
            for (var i = 0; i < radios.length; i++) {
                if (radios[i].checked) {
                    if (radios[i].value == "dni") {
                        document.getElementById("apellidoPaterno").disabled = false;
                        document.getElementById("apellidoMaterno").disabled = false;
                        document.getElementById("estadoSunat").disabled = true;
                        document.getElementById("condicionSunat").disabled = true;
                        this.limpiar();
                    }
                    if (radios[i].value == "ruc") {
                        document.getElementById("apellidoPaterno").disabled = true;
                        document.getElementById("apellidoMaterno").disabled = true;
                        document.getElementById("estadoSunat").disabled = false;
                        document.getElementById("condicionSunat").disabled = false;
                        this.limpiar();
                    }
                    break;
                }
            }
        }

    }
}();