var AreaGlobal;
var stockGlobal;
var EstadoActual;

var ordenes = function () {

    return {

        en_guardar: function (idtipo) {
            this.generarCodigo(idtipo);
            var btn_2 = document.getElementById('editar');
            var btn_1 = document.getElementById('guardar');
            btn_2.style.display = 'none';
            btn_1.style.display = 'inline';
            this.limpiar();
            $("#lst-detalle").empty();
            $("#total").val("");
            $("#igv").val("");
            $("#subTotal").val("");
            document.getElementById("docIdentidad").disabled = false;
        },
        generarCodigo: function (idtipo) {
            const storedToDos = localStorage.getItem("empleado");
            const objec = JSON.parse(storedToDos);
            var fecha = new Date();
            var mes = this.zeroFill(fecha.getMonth(), 2);
            var anio = fecha.getFullYear();
            $.ajax({
                url: "http://localhost:8080/Grissy/controllers/Ordenes/generarCodigo.php",
                method: "POST",
                data: {
                    tipo: idtipo
                },
                timeout: 0,
                success: function (response) {
                    console.log(response);
                    var objListado = JSON.parse(response);
                    $(objListado).each(function (i, obj) {
                        if (idtipo == 1) {
                            $("#codigoordenes").val('C' + objec.id + '.' + mes + anio + '-' + obj.codigo);
                        } else {
                            $("#codigoordenes").val('S' + objec.id + '.' + mes + anio + '-' + obj.codigo);
                        }

                    });
                }
            })
        },
        consultaDocumento: function () {
            var doc = $("#docIdentidad").val();
            const radios = document.getElementsByName('esDocumento');

            for (var i = 0; i < radios.length; i++) {
                if (radios[i].checked) {
                    if (radios[i].value == "dni") {
                        console.log("dni: ", doc);
                        if (doc.length == 8) {
                            ordenes.buscarProveedorPorDocIdentidad(doc);
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
                            ordenes.buscarProveedorPorDocIdentidad(doc);
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
        buscarProveedorPorDocIdentidad: function (doc) {
            $.ajax({
                url: "http://localhost:8080/Grissy/controllers/Proveedor/buscarProveedorPorDocIdentidad.php",
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
                                $("#idProveedor").val(obj.id);
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
                                    text: "El Proveedor se encuentra inactivo",
                                    duration: 3000,
                                    close: true,
                                    backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                                }).showToast();
                                ordenes.limpiar();
                            }
                        });
                    } else {
                        Toastify({
                            text: "El Proveedor no se encuentra registrado",
                            duration: 3000,
                            close: true,
                            backgroundColor: "linear-gradient(to right,#ff5c74,#e30e2e )",
                        }).showToast();
                        ordenes.limpiar2();

                    }
                }
            })
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
        agregarProveedor: function () {
            if ($("#docIdentidad").val() != "") {
                if ($("#idProveedor").val() == "") {
                    const radios = document.getElementsByName('esDocumento');
                    console.log(radios);
                    for (var i = 0; i < radios.length; i++) {
                        if (radios[i].checked) {
                            if (radios[i].value == "dni") {
                                ordenes.consultarDNI();
                            }
                            if (radios[i].value == "ruc") {
                                ordenes.consultarRUC();
                                // }
                            }
                            break;
                        }
                    }
                } else {
                    Toastify({
                        text: "El proveedor ya se encuentra registrado",
                        duration: 3000,
                        close: true,
                        backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                    }).showToast();
                }
            } else {
                Toastify({
                    text: "Ingrese el documento del proveedor",
                    duration: 3000,
                    close: true,
                    backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                }).showToast();
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
                    // ordenes.guardarCliente($("#docIdentidad").val());
                    ordenes.guardarProveedor();

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

                    // ordenes.buscarClientePorDocIdentidad(doc);
                    console.log($("#docIdentidad").val());
                    ordenes.guardarProveedor();
                    // ordenes.buscarProveedorPorDocIdentidad($("#docIdentidad").val());

                }
            });
        },
        guardarProveedor: function () {
            var apellidoPaterno = $("#apellidoPaterno").val();
            var apellidoMaterno = $("#apellidoMaterno").val();
            var codigo = $("#codigo").val();
            var condicionSunat = $("#condicionSunat").val();
            var direccion = $("#direccion").val();
            var estadoSunat = $("#estadoSunat").val();
            var nombre = $("#nombre").val();
            var telefono = $("#telefono").val();

            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/Proveedor/guardarProveedor.php',
                method: "POST",
                data: {
                    codigo: codigo,
                    nombre: nombre,
                    apellidoMaterno: apellidoMaterno,
                    apellidoPaterno: apellidoPaterno,
                    condicionSunat: condicionSunat,
                    direccion: direccion,
                    docIdentidad: $("#docIdentidad").val(),
                    estadoSunat: estadoSunat,
                    telefono: telefono
                },
                complete: function (response) {
                    console.log(response);
                    ordenes.buscarProveedorPorDocIdentidad($("#docIdentidad").val());
                    Toastify({
                        text: "El Proveedor se agrego correctamente",
                        duration: 3000,
                        close: true,
                        backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                    }).showToast();


                }
            });
        },
        obtenerListaOrdenesC: function (idtipo) {
            $('#example').DataTable().destroy();
            $('#example').empty();
            var table = $('#example').DataTable({
                "ajax": {
                    "method": "GET",
                    "url": "http://localhost:8080/Grissy/controllers/Ordenes/obtenerListaOrdenes.php",
                    "data": {
                        tipo: idtipo
                    },
                    "dataSrc": ""
                },
                "columns": [
                    { "title": "Codigo", "data": "codigo" },
                    { "title": "Fecha", "data": "fecha" },
                    { "title": "Proveedor", "data": "proveedor" },
                    { "title": "Subtotal", "data": "subTotal" },
                    { "title": "Igv", "data": "igv" },
                    { "title": "Total", "data": "total" },
                    {
                        "title": "Acciones", "defaultContent": "<button type='button' class='editar btn btn-outline-primary btn-sm' data-bs-toggle='modal' data-bs-target='#agregarordenes' ><span class='fa-fw select-all fas'></span></button>"
                            + "<button class='eliminar btn btn-outline-danger btn-sm' ><span class='fa-solid fa-circle-minus'></span></button>"
                            + "<button class='restablecer btn btn-outline-success btn-sm' ><span class='fa-solid fa-circle-check'></span></button>"
                    }
                ],
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
                },
                "responsive": "true",

            });
            ordenes.obtener_data_editar("#example tbody", table);
            ordenes.obtener_data_eliminar("#example tbody", table);
            ordenes.obtener_data_restaurar("#example tbody", table);

        },
        obtener_data_editar: function (tbody, table) {
            $(tbody).on("click", "button.editar", function () {
                var data = table.row($(this).parents("tr")).data();
                console.log(data);
                ordenes.obtenerPorCodigo(data.codigo, data.idProveedor, data.idTipo, data.estado);
            });
        },
        obtenerPorCodigo: function (codigo, idProveedor, idTipo, estado) {
            document.getElementById("docIdentidad").disabled = true;

            var btn_2 = document.getElementById('editar');
            var btn_1 = document.getElementById('guardar');
            EstadoActual = estado;

            if (estado == 0) {
                btn_2.style.display = 'none';
                btn_1.style.display = 'none';
            } else {
                btn_2.style.display = 'inline';
                btn_1.style.display = 'none';
            }
            console.log(codigo);
            $("#codigoordenes").val(codigo);
            this.listarDetalleordenes(idTipo);
            $.ajax({
                url: "http://localhost:8080/Grissy/controllers/Proveedor/buscarProveedorPorId.php",
                method: "GET",
                data: {
                    id: idProveedor
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
                        $("#idProveedor").val(obj.id);
                    });
                }
            })

        },
        listarDetalleordenes: function (idTipo) {
            $("#lst-detalle").empty();
            codigo = $("#codigoordenes").val();

            $.ajax({
                url: "http://localhost:8080/Grissy/controllers/Ordenes/listarOrdenesDetalle.php",
                method: "GET",
                data: {
                    codigoordenes: codigo
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
                        var detalleordenes = '';
                        detalleordenes += '<tr table-sm >';

                        detalleordenes += '<td>' + obj.nombreProducto + '</td>';
                        detalleordenes += '<td>' + obj.cantidad + '</td>';
                        detalleordenes += '<td>' + obj.precio + '</td>';
                        detalleordenes += '<td>' + obj.total + '</td>';
                        if (EstadoActual == 0) {
                            detalleordenes += '<td><button disabled="true"  class=" btnbtn-transparent-light btn-xs" type="button" onclick="ordenes.eliminarordenes(' + obj.id + ',' + obj.idProducto + ',' + obj.cantidad + ',' + idTipo + ')"><span class="fa-fw select-all fas"></span></button></button></td>';
                        } else {
                            detalleordenes += '<td><button class=" btnbtn-transparent-light btn-xs" type="button" onclick="ordenes.eliminarordenes(' + obj.id + ',' + obj.idProducto + ',' + obj.cantidad + ',' + idTipo + ')"><span class="fa-fw select-all fas"></span></button></button></td>';
                        }
                        detalleordenes += '</tr>';
                        $("#lst-detalle").append(detalleordenes);

                    });
                    $("#total").val(total.toFixed(2));
                    igv = total * 0.18;
                    $("#igv").val(igv.toFixed(2));
                    subTotal = total - igv;
                    $("#subTotal").val(subTotal.toFixed(2));
                }
            })
        },
        eliminarordenes: function (id, idProducto, cantidad, idTipo) {
            var stock;
            const storedToDos = localStorage.getItem("empleado");
            const objec = JSON.parse(storedToDos);


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
                        if (idTipo == 1) {
                            $.ajax({
                                url: 'http://localhost:8080/Grissy/controllers/Producto/actualizarStockProducto.php',
                                method: "POST",
                                data: {
                                    idProducto: idProducto,
                                    cantidad: stock
                                },
                                success: function (response) {
                                    console.log(response);
                                    ordenes.obtenerPorNombre(idTipo);
                                }
                            });

                        }

                    });
                }
            });


            // ordenes.guardarEntradas_Salidas(objec.id, AreaGlobal, idProducto, stock, 1);

            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/ordenes/eliminarDetalleordenes.php',
                method: "POST",
                data: {
                    id: id
                },
                complete: function (response) {
                    console.log(response);
                    ordenes.listarDetalleordenes(idtipo);
                }
            });
        },
        obtener_data_eliminar: function (tbody, table) {
            $(tbody).on("click", "button.eliminar", function () {
                var data = table.row($(this).parents("tr")).data();
                console.log(data);
                ordenes.inabilitarordenes(data.id, 0, data.idTipo);
            });
        },
        obtener_data_restaurar: function (tbody, table) {
            $(tbody).on("click", "button.restablecer", function () {
                var data = table.row($(this).parents("tr")).data();
                console.log(data);
                ordenes.inabilitarordenes(data.id, 1, data.idTipo);
            });
        },
        inabilitarordenes: function (id, estado, idtipo) {
            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/Ordenes/eliminarOrdenes.php',
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
                        ordenes.obtenerListaOrdenesC(idtipo);
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
        obtenerPorNombre: function (idTipo) {
            $("#lst-producto").empty();

            var nombrePro = $("#nombrePro").val();

            $.ajax({
                url: "http://localhost:8080/Grissy/controllers/Producto/buscarProductoPorNombreTipo.php",
                method: "GET",
                data: {
                    nombrePro: nombrePro,
                    tipo: idTipo
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
                        if (EstadoActual == 0) {
                            producto += '<td class="text-center"><button  disabled="true"  class="btn btn-outline-primary btn-sm" type="button" onclick="ordenes.botonSeleccionadorDeProducto(' + obj.id + ',' + idTipo + ');"><span class="fa-fw select-all fas"></span></button></button></td>';
                        } else {
                            producto += '<td class="text-center"><button class="btn btn-outline-primary btn-sm" type="button" onclick="ordenes.botonSeleccionadorDeProducto(' + obj.id + ',' + idTipo + ');"><span class="fa-fw select-all fas"></span></button></button></td>';
                        }
                        producto += '</tr>';

                        $("#lst-producto").append(producto);

                    });
                }
            })
        },
        botonSeleccionadorDeProducto: function (id, idTipo) {
            var urlData = "";
            if (idTipo == 1) {
                urlData = "http://localhost:8080/Grissy/controllers/Producto/buscarProductoPorId.php"
            } else {
                urlData = "http://localhost:8080/Grissy/controllers/Producto_Servicio/buscarProductoPorId.php"

            }

            $.ajax({
                url: urlData,
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
                        AreaGlobal = obj.idarea;

                        console.log(obj.idarea);
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
        IngresarProductoOrden: function (idTipo) {

            const storedToDos = localStorage.getItem("empleado");
            const objec = JSON.parse(storedToDos);

            if ($("#idPro").val() != "") {
                if ($("#cantidadEditable").val() != "") {
                    //---------------------------------------------------
                    codigoordenes = $("#codigoordenes").val();
                    idProducto = $("#idPro").val();
                    cantidad = $("#cantidadEditable").val();
                    precio = $("#precioPro").val();
                    total = parseFloat(precio) * parseInt(cantidad);
                    //---------------------------------------------------
                    cantidadActualizar = parseInt($("#cantidadPro").val()) + parseInt($("#cantidadEditable").val());
                    //---------------------------------------------------

                    //Detalle ordenes
                    $.ajax({
                        url: 'http://localhost:8080/Grissy/controllers/Ordenes/ingresarDetalleOrdenes.php',
                        method: "POST",
                        data: {
                            codigoOrden: codigoordenes,
                            idProducto: idProducto,
                            cantidad: cantidad,
                            precio: precio,
                            total: total
                        },
                        complete: function (response) {
                            console.log(response);
                            ordenes.listarDetalleordenes(idTipo);
                        }
                    });
                    //Actualizar Cantidad Producto
                    if (idTipo == 1) {
                        $.ajax({
                            url: 'http://localhost:8080/Grissy/controllers/Producto/actualizarStockProducto.php',
                            method: "POST",
                            data: {
                                idProducto: idProducto,
                                cantidad: cantidadActualizar,
                            },
                            complete: function (response) {
                                console.log(response);
                                ordenes.obtenerPorNombre(idTipo);
                            }
                        });

                        ordenes.guardarEntradas_Salidas(objec.id, AreaGlobal, idProducto, cantidad, 1)
                    }
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
        guardarOrdenes: function (idTipo) {
            const storedToDos = localStorage.getItem("empleado");
            const objec = JSON.parse(storedToDos);

            codigoordenes = $("#codigoordenes").val();
            idPersonal = objec.id;
            idProveedor = $("#idProveedor").val();
            total = $("#total").val();
            igv = $("#igv").val();
            subTotal = $("#subTotal").val();
            if ($("#docIdentidad").val().length == 8 || $("#docIdentidad").val().length == 11) {
                if ($("#idProveedor").val() != "") {


                    $.ajax({
                        url: 'http://localhost:8080/Grissy/controllers/Ordenes/guardarOrdenes.php',
                        method: "POST",
                        data: {
                            codigo: codigoordenes,
                            idProveedor: idProveedor,
                            total: total,
                            igv: igv,
                            subTotal: subTotal,
                            idTipo: 1
                        },
                        complete: function (response) {
                            console.log(response);
                            ordenes.obtenerListaOrdenesC(idTipo);
                        }
                    });

                    // if (idTipo == 1) {
                    //     $.ajax({
                    //         url: 'http://localhost:8080/Grissy/controllers/Ordenes/estadodeProducto.php',
                    //         method: "POST",
                    //         data: {
                    //             codigo: codigoordenes
                    //         },
                    //         complete: function (response) {
                    //             console.log(response);
                    //             ordenes.obtenerListaOrdenesC(idTipo);
                    //         }
                    //     });
                    // }

                    $('#agregarordenes').modal('hide');
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
        zeroFill: function (number, width) {
            width -= number.toString().length;
            if (width > 0) {
                return new Array(width + (/\./.test(number) ? 2 : 1)).join('0') + number;
            }
            return number + ""; // siempre devuelve tipo cadena
        },
        limpiarModal: function () {
            $("#docIdentidad").val('');
            this.limpiarSeleccion();
        },
        editarOrdenes: function (idTipo) {
            codigoordenes = $("#codigoordenes").val();
            total = $("#total").val();
            igv = $("#igv").val();
            subTotal = $("#subTotal").val();
            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/Ordenes/editarOrdenes.php',
                method: "POST",
                data: {
                    codigo: codigoordenes,
                    total: total,
                    igv: igv,
                    subTotal: subTotal
                },
                complete: function (response) {
                    console.log(response);
                    ordenes.obtenerListaOrdenesC(idTipo);
                }
            });
        },
        guardarEntradas_Salidas: function (idEncargado, idArea, idProducto, monto, condicion) {
            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/Reporte/ingresarEntradaSalida.php',
                method: "POST",
                data: {
                    idEncargado: idEncargado,
                    idArea: idArea,
                    idProducto: idProducto,
                    monto: monto,
                    condicion: condicion
                }, success: function (response) {
                    console.log(response);
                }
            });
        }
    }
}();
