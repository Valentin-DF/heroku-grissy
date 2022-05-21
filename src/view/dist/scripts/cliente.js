var cliente = function () {

    return {
        en_guardar: function () {
            document.getElementById("dni").style.display = 'inline';
            document.getElementById("ruc").style.display = 'inline';
            var btn_2 = document.getElementById('editar');
            var btn_1 = document.getElementById('guardar');
            btn_2.style.display = 'none';
            btn_1.style.display = 'inline';
            this.limpiar();
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
                            cliente.obtenerListaCliente();
                            cliente.limpiar();
                            $('#agregarCliente').modal('hide');

                        }

                    });
                }
            });
        },

        obtenerListaCliente: function () {
            $('#example').DataTable().destroy();
            $('#example').empty();
            var table = $('#example').DataTable({
                "ajax": {
                    "method": "GET",
                    "url": "http://localhost:8080/Grissy/controllers/Cliente/obtenerListaClientes.php",
                    "dataSrc": ""
                },
                "columns": [
                    { "title": "Codigo", "data": "codigo" },
                    { "title": "Doc. Identidad", "data": "docIdentidad" },
                    { "title": "Nombre", "data": "nombre" },
                    { "title": "Apellido Paterno", "data": "apellidoPaterno" },
                    { "title": "Apellido Materno", "data": "apellidoMaterno" },
                    { "title": "Fecha Registro", "data": "fechaRegistro" },

                    { "title": "Acciones", "defaultContent": "<button type='button' class='editar btn btn-outline-primary btn-sm' data-bs-toggle='modal' data-bs-target='#agregarCliente' ><span class='fa-fw select-all fas'></span></button>"
                                                            +"<button class='eliminar btn btn-outline-danger btn-sm' ><span class='fa-fw select-all fas'></span></button>" 
                                                            +"<button class='restablecer btn btn-outline-success btn-sm' ><span class='fa-solid fa-circle-check'></span></button>" }
                ],
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
                },
                "responsive": "true",
                // "dom": "Bfrtilp",


            });
            cliente.obtener_data_editar("#example tbody", table);
            cliente.obtener_data_eliminar("#example tbody", table);
            cliente.obtener_data_restaurar("#example tbody", table);
        },

        obtener_data_editar: function (tbody, table) {
            $(tbody).on("click", "button.editar", function () {
                var data = table.row($(this).parents("tr")).data();
                console.log(data);
                cliente.obtenerPorId(data.id);
            });
        },

        obtenerPorId: function (id) {
            document.getElementById("dni").style.display = 'none';
            document.getElementById("ruc").style.display = 'none';
            var btn_2 = document.getElementById('editar');
            var btn_1 = document.getElementById('guardar');
            var estadoC;
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
            if (telefono.length == 9 || telefono == '') {

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
                                cliente.obtenerListaCliente();
                                cliente.limpiar();
                                $('#agregarCliente').modal('hide');

                            }

                        });

                    }
                });
            } else {
                Toastify({
                    text: "El telefono es incorrecto",
                    duration: 3000,
                    close: true,
                    backgroundColor: "linear-gradient(to right, #ff5c74,  #e30e2e )",
                }).showToast();
            }


        },

        obtener_data_eliminar: function (tbody, table) {
            $(tbody).on("click", "button.eliminar", function () {
                var data = table.row($(this).parents("tr")).data();
                console.log(data);
                cliente.eliminarCliente(data.id,0);
            });
        },

        obtener_data_restaurar: function (tbody, table) {
            $(tbody).on("click", "button.restablecer", function () {
                var data = table.row($(this).parents("tr")).data();
                console.log(data);
                cliente.eliminarCliente(data.id,1);
            });
        },

        eliminarCliente: function (id,estado) {
            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/Cliente/eliminarCliente.php',
                method: "POST",
                data: {
                    id: id,
                    estado:estado
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
                        cliente.obtenerListaCliente();
                    });

                }
            });
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
            document.getElementById("estadoC").innerHTML = "";
            document.getElementById("estadoC").style.backgroundColor = "transparent";
        },

        consultarDocIdentidad: function () {
            var doc = $("#docIdentidad").val();
            const radios = document.getElementsByName('esDocumento');
            console.log(radios);
            for (var i = 0; i < radios.length; i++) {
                if (radios[i].checked) {
                    if (radios[i].value == "dni") {
                        console.log("dni: ", doc);
                        if (doc.length == 8) {
                            this.consultarDNI();
                        }
                        if (doc.length > 8) {
                            $("#docIdentidad").val('');
                            Toastify({
                                text: "El DNI ingresado es invalido",
                                duration: 3000,
                                close: true,
                                backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                            }).showToast();
                        }
                    }
                    if (radios[i].value == "ruc") {
                        console.log("ruc: ", doc);
                        if (doc.length == 11) {
                            this.consultarRUC();
                        }
                        if (doc.length > 11) {
                            $("#docIdentidad").val('');
                            Toastify({
                                text: "El RUC ingresado es invalido",
                                duration: 3000,
                                close: true,
                                backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                            }).showToast();
                        }
                    }
                    break;
                }
            }
        },

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
        },
        validarCantidades: function () {
            var doc = $("#docIdentidad").val();
            const radios = document.getElementsByName('esDocumento');

            for (var i = 0; i < radios.length; i++) {
                if (radios[i].checked) {
                    if (radios[i].value == "dni") {
                        console.log("dni: ", doc);
                        if (doc.length < 8) {
                            Toastify({
                                text: "El DNI ingresado es invalido",
                                duration: 3000,
                                close: true,
                                backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                            }).showToast();
                        }
                        if (doc.length > 8) {
                            $("#docIdentidad").val('');
                            Toastify({
                                text: "El DNI ingresado es invalido",
                                duration: 3000,
                                close: true,
                                backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                            }).showToast();
                        }

                    }
                    if (radios[i].value == "ruc") {
                        console.log("ruc: ", doc);
                        if (doc.length < 11) {
                            Toastify({
                                text: "El RUC ingresado es invalido",
                                duration: 3000,
                                close: true,
                                backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                            }).showToast();
                        }
                        if (doc.length > 11) {
                            $("#docIdentidad").val('');
                            Toastify({
                                text: "El RUC ingresado es invalido",
                                duration: 3000,
                                close: true,
                                backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                            }).showToast();
                        }
                    }
                    break;
                }
            }
        },
        // validarTelefono: function () {
        //     var telefono = $("#telefono").val();
        //     if (telefono.length > 9) {
        //         $("#telefono").val('');
        //         Toastify({
        //             text: "El telefono ingresado es invalido",
        //             duration: 3000,
        //             close: true,
        //             backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
        //         }).showToast();
        //     }
        //     if (telefono.length < 9) {
        //         $("#telefono").val('');
        //         Toastify({
        //             text: "El telefono ingresado es invalido",
        //             duration: 3000,
        //             close: true,
        //             backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
        //         }).showToast();
        //     }
        //     if (telefono == ""){

        //     }

        // }
    }
}();