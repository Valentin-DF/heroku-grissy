// const { ajax } = require("jquery");

var venta = function () {

    return {
        consultaDocumento: function () {
            var doc = $("#docIdentidad").val();
            const radios = document.getElementsByName('esDocumento');

            for (var i = 0; i < radios.length; i++) {
                if (radios[i].checked) {
                    if (radios[i].value == "dni") {
                        console.log("dni: ", doc);
                        if (doc.length == 8) {
                            venta.buscarClientePorDocIdentidad(doc);
                        }
                    }
                    if (radios[i].value == "ruc") {
                        console.log("ruc: ", doc);
                        if (doc.length == 11) {
                            venta.buscarClientePorDocIdentidad(doc);
                        }
                    }
                    break;
                }
            }



        },
        consultarDNI: function () {
            var doc = $("#docIdentidad").val();

            $.ajax({
                url: 'https://dniruc.apisperu.com/api/v1/dni/' + doc,
                method: "GET",
                data: {
                    token: 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImVzcGlub3phdmlsbGFyQGdtYWlsLmNvbSJ9._ZzB3eoj0J1OPDMRYGdeziwiEtoJSejb3ruXOgJPlEA'
                },
                complete: function (response) {
                    console.log(response.responseJSON);
                    $("#codigo").val("D-"+response.responseJSON.dni);
                    $("#docIdentidad").val(response.responseJSON.dni);
                    $("#nombre").val(response.responseJSON.nombres);
                    $("#apellidoPaterno").val(response.responseJSON.apellidoPaterno);
                    $("#apellidoMaterno").val(response.responseJSON.apellidoMaterno);
                    console.log($("#docIdentidad").val());
                    // venta.guardarCliente($("#docIdentidad").val());
                    venta.guardarCliente();
                    venta.buscarClientePorDocIdentidad($("#docIdentidad").val());

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
                    $("#codigo").val("R-"+response.responseJSON.ruc);
                    $("#docIdentidad").val(response.responseJSON.ruc);
                    $("#nombre").val(response.responseJSON.razonSocial);
                    $("#condicionSunat").val(response.responseJSON.condicion);
                    $("#estadoSunat").val(response.responseJSON.estado);
                    $("#direccion").val(response.responseJSON.direccion);
                    
                    // venta.buscarClientePorDocIdentidad(doc);
                    console.log($("#docIdentidad").val());
                    venta.guardarCliente();
                    venta.buscarClientePorDocIdentidad($("#docIdentidad").val());

                }
            });
        },
        
        buscarClientePorDocIdentidad: function (doc) {

            $.ajax({
                url: "http://localhost:8080/Grissy/controllers/Cliente/buscarClientePorDocIdentidad.php",
                method: "GET",
                data: {
                    docIdentidad: doc
                },
                timeout: 0,
                success: function (response) {

                    console.log(response);

                    var objListado = JSON.parse(response);
                    if (objListado != "") {
                        $(objListado).each(function (i, obj) {

                            if (obj.estado == 1) {
                                $("#apellidoPaterno").val(obj.apellidoPaterno);
                                $("#apellidoMaterno").val(obj.apellidoMaterno);
                                $("#codigo").val(obj.codigo);
                                $("#condicionSunat").val(obj.condicionSunat);
                                $("#direccion").val(obj.direccion);
                                $("#docIdentidad").val(obj.docIdentidad);
                                $("#estadoSunat").val(obj.estadoSunat);
                                $("#nombre").val(obj.nombre);
                                $("#telefono").val(obj.telefono);
                            } else {
                                Toastify({
                                    text: "El cliente se encuentra inactivo",
                                    duration: 3000,
                                    close: true,
                                    backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                                }).showToast();
                                venta.limpiar();
                            }
                        });
                    } else {
                        Toastify({
                            text: "El cliente no se encuentra registrado",
                            duration: 3000,
                            close: true,
                            backgroundColor: "linear-gradient(to right,#ff5c74,#e30e2e )",
                        }).showToast();
                        venta.limpiar2();

                    }
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
        limpiar2: function () {
            $("#apellidoPaterno").val("");
            $("#apellidoMaterno").val("");
            $("#codigo").val("");
            $("#condicionSunat").val("");
            $("#direccion").val("");
            $("#estadoSunat").val("");
            $("#nombre").val("");
            $("#telefono").val("");
        },
        agregarCliente: function () {

            const radios = document.getElementsByName('esDocumento');
            console.log(radios);
            for (var i = 0; i < radios.length; i++) {
                if (radios[i].checked) {
                    if (radios[i].value == "dni") {
                        // console.log("dni: ", doc);
                        // if (doc.length == 8) {
                            venta.consultarDNI();
                        
                    }
                    if (radios[i].value == "ruc") {
                        // console.log("ruc: ", doc);
                        // if (doc.length == 11) {
                            venta.consultarRUC();
                        // }
                    }
                    break;
                }
            }
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
                    Toastify({
                        text: "El cliente se agrego correctamente",
                        duration: 3000,
                        close: true,
                        backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                    }).showToast();
                }
            });
        },
        obtenerPorNombre: function() {
            $("#lst-producto").empty();

            var nombrePro = $("#nombrePro").val();

            $.ajax({
                url: "http://localhost:8080/Grissy/controllers/Producto/buscarProductoPorNombre.php",
                method: "GET",
                data: {
                    nombrePro: nombrePro
                },
                timeout: 0,
                success: function (response) {

                    console.log(response);

                    var objListado = JSON.parse(response);
                    $(objListado).each(function (i, obj) {

                        var producto = '';
                        producto += '<tr>';
                        producto += '<td><input type="checkbox" class="form-check-input form-check-primary" name="selectCheck" id="selectfila"></td>';
                        producto += '<td>' + obj.codigo + '</td>';
                        producto += '<td>' + obj.nombre + '</td>';
                        producto += '<td>' + obj.cantidad + '</td>';
                        producto += '<td>' + obj.precio + '</td>';
                        producto += '<td>' + obj.talla + '</td>';
                        producto += '</tr>';
                        
                        $("#lst-producto").append(producto);

                    });
                }
            })
        }
    }
}();
