
var venta = function () {

    return {
        obtenerListaVenta: function () {
            const storedToDos = localStorage.getItem("empleado");
            const objec = JSON.parse(storedToDos);

            $('#example').DataTable().destroy();
            $('#example').empty();
            var table = $('#example').DataTable({
                "ajax": {
                    "method": "GET",
                    "url": "http://localhost:8080/Grissy/controllers/Venta/obtenerListaVentaPorPersonal.php",
                    "data": {
                        idempleado: objec.id
                    },
                    "dataSrc": ""
                },
                "columns": [
                    { "title": "Codigo", "data": "codigo" },
                    { "title": "Fecha", "data": "fecha" },
                    { "title": "Cliente", "data": "cliente" },
                    { "title": "Subtotal", "data": "subTotal" },
                    { "title": "Igv", "data": "igv" },
                    { "title": "Total", "data": "total" },
                    {
                        "title": "Acciones", "defaultContent": "<button type='button' class='editar btn btn-outline-primary btn-sm' data-bs-toggle='modal' data-bs-target='#agregarVenta' ><span class='fa-fw select-all fas'></span></button>"
                            + "<button class='eliminar btn btn-outline-danger btn-sm' ><span class='fa-fw select-all fas'></span></button>"
                    }
                ],
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
                },
                "responsive": "true",

            });
            venta.obtener_data_editar("#example tbody", table);
            venta.obtener_data_eliminar("#example tbody", table);
        },
        obtener_data_editar: function (tbody, table) {
            $(tbody).on("click", "button.editar", function () {
                var data = table.row($(this).parents("tr")).data();
                console.log(data);
                venta.obtenerPorCodigo(data.codigo, data.idCliente);
            });
        },
        obtener_data_eliminar: function (tbody, table) {
            $(tbody).on("click", "button.eliminar", function () {
                var data = table.row($(this).parents("tr")).data();
                console.log(data);

                // cliente.eliminarCliente(data.id);
            });
        },
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
                            venta.buscarClientePorDocIdentidad(doc);
                        }
                        if (doc.length > 11) {
                            $("#docIdentidad").val('');
                            Toastify({
                                text: "El ruc ingresado es invalido",
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
            var doc = $("#docIdentidad").val();

            $.ajax({
                url: 'https://dniruc.apisperu.com/api/v1/dni/' + doc,
                method: "GET",
                data: {
                    token: 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImVzcGlub3phdmlsbGFyQGdtYWlsLmNvbSJ9._ZzB3eoj0J1OPDMRYGdeziwiEtoJSejb3ruXOgJPlEA'
                },
                complete: function (response) {
                    console.log(response.responseJSON);
                    $("#codigo").val("D-" + response.responseJSON.dni);
                    $("#docIdentidad").val(response.responseJSON.dni);
                    $("#nombre").val(response.responseJSON.nombres);
                    $("#apellidoPaterno").val(response.responseJSON.apellidoPaterno);
                    $("#apellidoMaterno").val(response.responseJSON.apellidoMaterno);
                    console.log($("#docIdentidad").val());
                    // venta.guardarCliente($("#docIdentidad").val());
                    venta.guardarCliente();

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
                                $("#idCliente").val(obj.id);
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
            $("#idCliente").val("");
            if ($("#docIdentidad").val() != "") {
                if ($("#idCliente").val() == "") {
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
                } else {
                    Toastify({
                        text: "El cliente ya se encuentra registrado",
                        duration: 3000,
                        close: true,
                        backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                    }).showToast();
                }
            } else {
                Toastify({
                    text: "Ingrese el documento del cliente",
                    duration: 3000,
                    close: true,
                    backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                }).showToast();
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
                    venta.buscarClientePorDocIdentidad($("#docIdentidad").val());
                    Toastify({
                        text: "El cliente se agrego correctamente",
                        duration: 3000,
                        close: true,
                        backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                    }).showToast();
            

                }
            });
        },
        obtenerPorNombre: function () {
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
                        producto += '<tr class="table-xs">';

                        producto += '<td>' + obj.codigo + '</td>';
                        producto += '<td>' + obj.nombre + '</td>';
                        producto += '<td>' + obj.cantidad + '</td>';
                        producto += '<td>' + obj.precio + '</td>';
                        producto += '<td>' + obj.talla + '</td>';
                        producto += '<td class="text-center"><button class="btn btn-outline-primary btn-sm" type="button" onclick="venta.botonSeleccionadorDeProducto(' + obj.id + ');"><span class="fa-fw select-all fas"></span></button></button></td>';
                        producto += '</tr>';

                        $("#lst-producto").append(producto);

                    });
                }
            })
        },
        botonSeleccionadorDeProducto: function (id) {

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

                        $("#idPro").val(obj.id);
                        $("#precioPro").val(obj.precio);
                        $("#codigoPro").val(obj.codigo);
                        $("#cantidadPro").val(obj.cantidad);
                    });
                }
            })
        },
        validarCantidad: function () {

            var cantidadPro = parseInt($("#cantidadPro").val());
            var cantidadEditable = parseInt($("#cantidadEditable").val());
            if ($("#cantidadPro").val() != '' && $("#codigoPro").val() != '') {
                if (cantidadPro >= cantidadEditable) {
                    console.log('correcto', cantidadEditable);
                }
                if (cantidadPro < cantidadEditable) {
                    console.log('incorrecto', cantidadEditable)
                    $("#cantidadEditable").val('');
                    Toastify({
                        text: "La cantidad ingresada excede lo permitido",
                        duration: 3000,
                        close: true,
                        backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                    }).showToast();
                }
                if (0 >= cantidadEditable) {
                    console.log('incorrecto', cantidadEditable)
                    $("#cantidadEditable").val('');
                    Toastify({
                        text: "La cantidad ingresada no es valida",
                        duration: 3000,
                        close: true,
                        backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                    }).showToast();
                }
            } else {
                console.log('incorrecto', cantidadEditable)
                $("#cantidadEditable").val('');
                Toastify({
                    text: "Seleccione un producto",
                    duration: 3000,
                    close: true,
                    backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                }).showToast();
            }

        },
        limpiarSeleccion: function () {
            $("#codigoPro").val('');
            $("#cantidadPro").val('');
            $("#cantidadEditable").val('');
        },
        IngresarProductoVenta: function () {
            if ($("#idPro").val() != "") {
                if ($("#cantidadEditable").val() != "") {
                    //---------------------------------------------------
                    codigoVenta = $("#codigoVenta").val();
                    idProducto = $("#idPro").val();
                    cantidad = $("#cantidadEditable").val();
                    precio = $("#precioPro").val();
                    total = parseFloat(precio) * parseInt(cantidad);
                    //---------------------------------------------------
                    cantidadActualizar = parseInt($("#cantidadPro").val()) - parseInt($("#cantidadEditable").val());
                    //---------------------------------------------------

                    //Detalle Venta
                    $.ajax({
                        url: 'http://localhost:8080/Grissy/controllers/Venta/ingresarDetalleVenta.php',
                        method: "POST",
                        data: {
                            codigoVenta: codigoVenta,
                            idProducto: idProducto,
                            cantidad: cantidad,
                            precio: precio,
                            total: total
                        },
                        complete: function (response) {
                            console.log(response);
                            venta.listarDetalleVenta();
                        }
                    });
                    //Actualizar Cantidad Producto
                    $.ajax({
                        url: 'http://localhost:8080/Grissy/controllers/Producto/actualizarStockProducto.php',
                        method: "POST",
                        data: {
                            idProducto: idProducto,
                            cantidad: cantidadActualizar,
                        },
                        complete: function (response) {
                            console.log(response);
                            venta.obtenerPorNombre();
                        }
                    });

                    this.limpiarSeleccion();
                } else {
                    Toastify({
                        text: "Ingrese la cantidad a vender",
                        duration: 3000,
                        close: true,
                        backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                    }).showToast();
                }
            } else {
                Toastify({
                    text: "Seleccione un producto",
                    duration: 3000,
                    close: true,
                    backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                }).showToast();
                this.limpiarSeleccion();
            }
        },
        listarDetalleVenta: function () {
            $("#lst-detalle").empty();
            codigo = $("#codigoVenta").val();

            $.ajax({
                url: "http://localhost:8080/Grissy/controllers/Venta/listarVentaDetalle.php",
                method: "GET",
                data: {
                    codigoVenta: codigo
                },
                timeout: 0,
                success: function (response) {

                    console.log(response);
                    var total = 0.00;
                    var igv = 0.00;
                    var subTotal = 0.00;
                    var objListado = JSON.parse(response);
                    $(objListado).each(function (i, obj) {
                        total = parseFloat(obj.total) + total;
                        var detalleventa = '';
                        detalleventa += '<tr table-sm >';

                        detalleventa += '<td>' + obj.nombreProducto + '</td>';
                        detalleventa += '<td>' + obj.cantidad + '</td>';
                        detalleventa += '<td>' + obj.precio + '</td>';
                        detalleventa += '<td>' + obj.total + '</td>';
                        detalleventa += '<td><button class=" btnbtn-transparent-light btn-xs" type="button" onclick="venta.eliminarVenta(' + obj.id + ',' + obj.idProducto + ',' + obj.cantidad + ')"><span class="fa-fw select-all fas"></span></button></button></td>';
                        detalleventa += '</tr>';
                        $("#lst-detalle").append(detalleventa);

                    });
                    $("#total").val(total.toFixed(2));
                    igv = total * 0.18;
                    $("#igv").val(igv.toFixed(2));
                    subTotal = total - igv;
                    $("#subTotal").val(subTotal.toFixed(2));
                }
            })
        },
        guardarVenta: function () {
            const storedToDos = localStorage.getItem("empleado");
            const objec = JSON.parse(storedToDos);

            codigoVenta = $("#codigoVenta").val();
            idPersonal = objec.id;
            idCliente = $("#idCliente").val();
            total = $("#total").val();
            igv = $("#igv").val();
            subTotal = $("#subTotal").val();
            if ($("#docIdentidad").val().length == 8 || $("#docIdentidad").val().length == 11) {
                if ($("#idCliente").val() != "") {


                    $.ajax({
                        url: 'http://localhost:8080/Grissy/controllers/Venta/guardarVenta.php',
                        method: "POST",
                        data: {
                            codigo: codigoVenta,
                            idPersonal: idPersonal,
                            idCliente: idCliente,
                            total: total,
                            igv: igv,
                            subTotal: subTotal
                        },
                        complete: function (response) {
                            console.log(response);
                            venta.obtenerListaVenta();
                        }
                    });


                    $.ajax({
                        url: 'http://localhost:8080/Grissy/controllers/Venta/estadodeProducto.php',
                        method: "POST",
                        data: {
                            codigo: codigoVenta
                        },
                        complete: function (response) {
                            console.log(response);
                            venta.obtenerListaVenta();
                        }
                    });

                    $('#agregarVenta').modal('hide');
                } else {
                    Toastify({
                        text: "Registre al cliente",
                        duration: 3000,
                        close: true,
                        backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                    }).showToast();
                }
            } else {
                Toastify({
                    text: "El documento ingresado es invalido",
                    duration: 3000,
                    close: true,
                    backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                }).showToast();
            }

        },
        generarCodigo: function () {
            const storedToDos = localStorage.getItem("empleado");
            const objec = JSON.parse(storedToDos);
            var fecha = new Date();
            var mes = this.zeroFill(fecha.getMonth(), 2);
            var anio = fecha.getFullYear();
            $.ajax({
                url: "http://localhost:8080/Grissy/controllers/Venta/generarCodigo.php",
                method: "POST",
                data: {
                    idempleado: objec.id
                },
                timeout: 0,
                success: function (response) {
                    console.log(response);
                    var objListado = JSON.parse(response);
                    $(objListado).each(function (i, obj) {

                        $("#codigoVenta").val('V' + objec.id + '.' + mes + anio + '-' + obj.codigo);

                    });
                }
            })
        },
        zeroFill: function (number, width) {
            width -= number.toString().length;
            if (width > 0) {
                return new Array(width + (/\./.test(number) ? 2 : 1)).join('0') + number;
            }
            return number + ""; // siempre devuelve tipo cadena
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
        limpiarModal: function () {
            $("#docIdentidad").val('');
            this.limpiarSeleccion();
        },
        en_guardar: function () {
            this.generarCodigo();
            var btn_2 = document.getElementById('editar');
            var btn_1 = document.getElementById('guardar');
            btn_2.style.display = 'none';
            btn_1.style.display = 'inline';
            this.limpiar();
            $("#lst-detalle").empty();
            $("#total").val("");
            $("#igv").val("");
            $("#subTotal").val("");


        },
        obtenerPorCodigo: function (codigo, idCliente) {
            var btn_2 = document.getElementById('editar');
            var btn_1 = document.getElementById('guardar');
            btn_2.style.display = 'inline';
            btn_1.style.display = 'none';
            console.log(codigo);
            $("#codigoVenta").val(codigo);
            this.listarDetalleVenta();
            $.ajax({
                url: "http://localhost:8080/Grissy/controllers/Cliente/buscarClientePorId.php",
                method: "GET",
                data: {
                    id: idCliente
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
                        $("#idCliente").val(obj.id);
                    });
                }
            })

        },
        editarVenta: function () {
            codigoVenta = $("#codigoVenta").val();
            total = $("#total").val();
            igv = $("#igv").val();
            subTotal = $("#subTotal").val();
            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/Venta/editarVenta.php',
                method: "POST",
                data: {
                    codigo: codigoVenta,
                    total: total,
                    igv: igv,
                    subTotal: subTotal
                },
                complete: function (response) {
                    console.log(response);
                    venta.obtenerListaVenta();
                }
            });
        },
        eliminarVenta: function (id, idProducto, cantidad) {
            var stock;


            $.ajax({
                url: "http://localhost:8080/Grissy/controllers/Producto/buscarProductoPorId.php",
                method: "GET",
                data: {
                    id: idProducto
                },
                timeout: 0,
                success: function (response) {

                    console.log(response);

                    var objListado = JSON.parse(response);
                    $(objListado).each(function (i, obj) {

                        stock = cantidad + obj.cantidad;
                        $.ajax({
                            url: 'http://localhost:8080/Grissy/controllers/Producto/actualizarStockProducto.php',
                            method: "POST",
                            data: {
                                idProducto: idProducto,
                                cantidad: stock
                            },
                            success: function (response) {
                                console.log(response);
                                venta.obtenerPorNombre();
                            }
                        });

                    });
                }
            });





            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/Venta/eliminarDetalleVenta.php',
                method: "POST",
                data: {
                    id: id
                },
                complete: function (response) {
                    console.log(response);
                    venta.listarDetalleVenta();
                }
            });
        }
    }
}();
