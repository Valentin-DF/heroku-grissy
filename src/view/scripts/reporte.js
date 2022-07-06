var reporte = function () {

    return {

        obtenerListaES: function () {
            $.ajax({
                url: "http://localhost:8080/Grissy/controllers/Reporte/listaEntradaSalida.php",
                method: "GET",
                timeout: 0,
                success: function (response) {

                    console.log(response);


                    var objListado = JSON.parse(response);
                    $(objListado).each(function (i, obj) {
                        var stock = '';
                        stock += '<tr>';
                        stock += '<td WIDTH="150"   scope="row">' + obj.fecha + '</td>';
                        stock += '<td WIDTH="300"  scope="row" ><p style="font-size: 0.8rem" class=" text-danger">' + obj.codigoEncargado + '<br><span class=" text-dark">' + obj.nombreEncargado + '</span></td>';
                        stock += '<td scope="row"><p style="font-size: 0.8rem" class=" text-danger">' + obj.codigoArea + '<br><span class=" text-dark">' + obj.nombreArea + '</span></td>';
                        stock += '<td scope="row"><p style="font-size: 0.8rem" class=" text-danger">' + obj.codigoProducto + '<br><span class=" text-dark">' + obj.nombreProducto + '</span> </td>';
                        if (obj.condicion == 0) {
                            stock += '<td scope="row"><p  class=" text-danger"><i class="fa-solid fa-arrow-down-long"></i> ' + obj.monto + '</p></td>';
                        } else {
                            stock += '<td scope="row"><p  class=" text-success" ><i class="fa-solid fa-arrow-up-long"></i> ' + obj.monto + '</p></td>';
                        }

                        stock += '</tr>';


                        $("#lst-stock").append(stock);
                    });
                }
            })

        },
        obtenerListaProductos: function () {
            $.ajax({
                url: "http://localhost:8080/Grissy/controllers/Producto/obtenerListaProductos.php",
                method: "GET",
                timeout: 0,
                success: function (response) {

                    console.log(response);

                    var objListado = JSON.parse(response);
                    $(objListado).each(function (i, obj) {
                        var producto = '';
                        producto = '<option value="' + obj.id + '">' + obj.nombre + '</option>';
                        $("#idProducto").append(producto);
                    });
                }
            })
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
                        area = '<option value="' + obj.id + '">' + obj.nombre + '</option>';
                        $("#idArea").append(area);
                    });
                }
            })
        },
        obtenerListaEncargado: function () {
            $.ajax({
                url: "http://localhost:8080/Grissy/controllers/Personal/obtenerlistaPersonal.php",
                method: "GET",
                timeout: 0,
                success: function (response) {

                    console.log(response);

                    var objListado = JSON.parse(response);
                    $(objListado).each(function (i, obj) {
                        var encargado = '';
                        encargado = '<option value="' + obj.id + '">' + obj.nombre + '</option>';
                        $("#idEncargado").append(encargado);
                    });
                }
            })
        },
        busquedaAvanzada: function () {
            $("#lst-stock").empty();
            var fechaInicio = '';
            var fechaFinal = '';
            var idArea = '';
            var idEncargado = '';
            var idProducto = '';


            if (document.querySelector('#entreFechas').checked == true) {
                fechaInicio = $("#fechaInicio").val();
                fechaFinal = $("#fechaFinal").val();
            } 
            if (document.querySelector('#porArea').checked == true) {
                idArea = $("#idArea").val();
            }
            if (document.querySelector('#porEncargado').checked == true) {
                idEncargado = $("#idEncargado").val();
            }
            if (document.querySelector('#porProducto').checked == true) {
                idProducto = $("#idProducto").val();
            }

            console.log(fechaInicio + '-' + fechaFinal + '-' + idArea + '-' + idEncargado + '-' + idProducto)
            $.ajax({
                url: "http://localhost:8080/Grissy/controllers/Reporte/obtenerEntradaSalida.php",
                method: "GET",
                data: {
                    fechaInicio: fechaInicio,
                    fechaFinal: fechaFinal,
                    idEncargado: idEncargado,
                    idArea: idArea,
                    idProducto: idProducto,
                },
                timeout: 0,
                success: function (response) {

                    console.log(response);

                    var objListado = JSON.parse(response);
                    $(objListado).each(function (i, obj) {
                        var stock = '';
                        stock += '<tr>';
                        stock += '<td WIDTH="150"   scope="row">' + obj.fecha + '</td>';
                        stock += '<td WIDTH="300"  scope="row" ><p style="font-size: 0.8rem" class=" text-danger">' + obj.codigoEncargado + '<br><span class=" text-dark">' + obj.nombreEncargado + '</span></td>';
                        stock += '<td scope="row"><p style="font-size: 0.8rem" class=" text-danger">' + obj.codigoArea + '<br><span class=" text-dark">' + obj.nombreArea + '</span></td>';
                        stock += '<td scope="row"><p style="font-size: 0.8rem" class=" text-danger">' + obj.codigoProducto + '<br><span class=" text-dark">' + obj.nombreProducto + '</span> </td>';
                        if (obj.condicion == 0) {
                            stock += '<td scope="row"><p  class=" text-danger"><i class="fa-solid fa-arrow-down-long"></i> ' + obj.monto + '</p></td>';
                        } else {
                            stock += '<td scope="row"><p  class=" text-success" ><i class="fa-solid fa-arrow-up-long"></i> ' + obj.monto + '</p></td>';
                        }

                        stock += '</tr>';


                        $("#lst-stock").append(stock);
                    });
                }
            })
        },
        obtenerListaV: function () {
            $.ajax({
                url: "http://localhost:8080/Grissy/controllers/Reporte/listaVenta.php",
                method: "GET",
                timeout: 0,
                success: function (response) {

                    console.log(response);

                    var sumaVentas = 0;
                    var objListado = JSON.parse(response);
                    $(objListado).each(function (i, obj) {
                        var venta = '';

                        if (obj.estado == 0) {
                            venta += '<tr style="background-color: #FED7D7">';
                        } else if (obj.estado == 1) {
                            venta += '<tr style="background-color: #FDFED7">';
                        } else {
                            venta += '<tr style="background-color: #E5FED7">';
                        }
                        venta += '<td scope="row" style="font-size: 0.8rem"  class=" text-dark">' + obj.fecha + '</td>';
                        venta += '<td scope="row" style="font-size: 0.8rem"  class=" text-dark">' + obj.codigoVenta + '</td>';
                        venta += '<td scope="row"><p style="font-size: 0.8rem" class=" text-danger">' + obj.codigoEncargado + '<br><span class=" text-dark">' + obj.nombreEncargado + '</span></td>';
                        venta += '<td scope="row"><p style="font-size: 0.8rem" class=" text-danger">' + obj.dni + '<br><span class=" text-dark">' + obj.cliente + '</span></td>';
                        venta += '<td scope="row" style="font-size: 0.8rem"  class=" text-dark">' + obj.descripcion + '</td>';
                        venta += '<td scope="row" style="font-size: 0.8rem"  class=" text-dark">S/.' + obj.monto + '</td>';
                        if (obj.estado == 0) {
                            venta += '<td scope="row" style="font-size: 0.8rem"  class=" text-danger">Deshabilitado</td>';
                        } else if (obj.estado == 1) {
                            venta += '<td scope="row" style="font-size: 0.8rem"  class=" text-warning">Pendiente</td>';
                        } else {
                            venta += '<td scope="row"  style="font-size: 0.8rem"  class=" text-success">Cobrado</td>';
                        }

                        venta += '</tr>';
                        sumaVentas = parseFloat(obj.monto) + sumaVentas;

                        $("#lst-venta").append(venta);
                    });

                    document.getElementById("totalLista").innerHTML = 'S/. ' + sumaVentas;
                }
            })

        },
        busquedaAvanzadav: function () {
            $("#lst-venta").empty();
            var fechaInicio = $("#fechaInicio").val();
            var fechaFinal = $("#fechaFinal").val();
            var idEncargado = $("#idEncargado").val();

            $.ajax({
                url: "http://localhost:8080/Grissy/controllers/Reporte/obtenerVenta.php",
                method: "GET",
                data: {
                    fechaInicio: fechaInicio,
                    fechaFinal: fechaFinal,
                    idEncargado: idEncargado,


                },
                timeout: 0,
                success: function (response) {

                    console.log(response);
                    var sumaVentas = 0;
                    var objListado = JSON.parse(response);
                    $(objListado).each(function (i, obj) {
                        var venta = '';

                        if (obj.estado == 0) {
                            venta += '<tr style="background-color: #FED7D7">';
                        } else if (obj.estado == 1) {
                            venta += '<tr style="background-color: #FDFED7">';
                        } else {
                            venta += '<tr style="background-color: #E5FED7">';
                        }
                        venta += '<td scope="row" style="font-size: 0.8rem"  class=" text-dark">' + obj.fecha + '</td>';
                        venta += '<td scope="row" style="font-size: 0.8rem"  class=" text-dark">' + obj.codigoVenta + '</td>';
                        venta += '<td scope="row"><p style="font-size: 0.8rem" class=" text-danger">' + obj.codigoEncargado + '<br><span class=" text-dark">' + obj.nombreEncargado + '</span></td>';
                        venta += '<td scope="row"><p style="font-size: 0.8rem" class=" text-danger">' + obj.dni + '<br><span class=" text-dark">' + obj.cliente + '</span></td>';
                        venta += '<td scope="row" style="font-size: 0.8rem"  class=" text-dark">' + obj.descripcion + '</td>';
                        venta += '<td scope="row" style="font-size: 0.8rem"  class=" text-dark">S/.' + obj.monto + '</td>';
                        if (obj.estado == 0) {
                            venta += '<td scope="row" style="font-size: 0.8rem"  class=" text-danger">Deshabilitado</td>';
                        } else if (obj.estado == 1) {
                            venta += '<td scope="row" style="font-size: 0.8rem"  class=" text-warning">Pendiente</td>';
                        } else {
                            venta += '<td scope="row"  style="font-size: 0.8rem"  class=" text-success">Cobrado</td>';
                        }

                        venta += '</tr>';
                        sumaVentas = parseFloat(obj.monto) + sumaVentas;

                        $("#lst-venta").append(venta);
                    });
                    console.log(sumaVentas);
                    document.getElementById("totalLista").innerHTML = sumaVentas;
                }
            })
        },
        checkFecha: function () {
            console.log(document.querySelector('#entreFechas').checked);
            if (document.querySelector('#entreFechas').checked == true) {
                $("#fechaInicio").show();
                $("#fechaFinal").show();
                $("#f").show();
                $("#f2").show();
            } else {
                $("#fechaInicio").hide();
                $("#fechaFinal").hide();
                $("#f").hide();
                $("#f2").hide();

            }
        },
        checkEncrgado: function () {
            console.log(document.querySelector('#porEncargado').checked);
            if (document.querySelector('#porEncargado').checked == true) {
                $("#idEncargado").show();
                $("#e").show();
            } else {
                $("#idEncargado").hide();
                $("#e").hide();
            }
        },
        checkArea: function () {
            console.log(document.querySelector('#porArea').checked);
            if (document.querySelector('#porArea').checked == true) {
                $("#idArea").show();
                $("#a").show();
            } else {
                $("#idArea").hide();
                $("#a").hide();
            }
        },
        checkProducto: function () {
            console.log(document.querySelector('#porProducto').checked);
            if (document.querySelector('#porProducto').checked == true) {
                $("#idProducto").show();
                $("#p").show();
            } else {
                $("#idProducto").hide();
                $("#p").hide();
            }
        },

    }

}();