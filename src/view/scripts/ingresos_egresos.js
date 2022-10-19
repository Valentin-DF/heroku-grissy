var ingresos_egresos = function () {

    return {

        mostrarRadio: function () {
            const radios = document.getElementsByName('status');
            for (var i = 0; i < radios.length; i++) {
                if (radios[i].checked) {
                    if (radios[i].value == "fecha") {
                        $("#descripcion_fecha").val("Fecha");
                        document.getElementById("fecha_inicial").hidden = true;
                        document.getElementById("fecha_final").hidden = false;
                        document.getElementById("fecha_mes_ano").hidden = true;
                    }
                    if (radios[i].value == "rango_fechas") {
                        $("#descripcion_fecha").val("Rango de Fechas");
                        document.getElementById("fecha_inicial").hidden = false;
                        document.getElementById("fecha_final").hidden = false;
                        document.getElementById("fecha_mes_ano").hidden = true;
                    }
                    if (radios[i].value == "mes_ano") {
                        $("#descripcion_fecha").val("En Mes y Año");
                        document.getElementById("fecha_inicial").hidden = true;
                        document.getElementById("fecha_final").hidden = true;
                        document.getElementById("fecha_mes_ano").hidden = false;
                    }
                    break;
                }
            }
        },

        mostrar: function () {
            const radios = document.getElementsByName('status');
            for (var i = 0; i < radios.length; i++) {
                if (radios[i].checked) {
                    if (radios[i].value == "fecha") {
                        var fecha = $("#fecha_final").val();
                        if (fecha == "") {
                            Toastify({
                                text: "Ingrese una fecha",
                                duration: 3000,
                                close: true,
                                backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                            }).showToast();
                        } else {
                            ingresos_egresos.buscarPorFecha(fecha, "", "");
                        }
                    }
                    if (radios[i].value == "rango_fechas") {
                        var fechaI = $("#fecha_inicial").val();
                        var fechaF = $("#fecha_final").val();
                        if (fechaI == "" && fechaF == "") {
                            Toastify({
                                text: "Ingrese ambas fecha",
                                duration: 3000,
                                close: true,
                                backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                            }).showToast();
                        } else {
                            ingresos_egresos.buscarPorFecha(fechaF, fechaI, "");
                        }
                    }
                    if (radios[i].value == "mes_ano") {
                        var fecha = $("#fecha_mes_ano").val();
                        if (fecha == "") {
                            Toastify({
                                text: "Ingrese un periodo",
                                duration: 3000,
                                close: true,
                                backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                            }).showToast();
                        } else {
                            ingresos_egresos.buscarPorFecha("", "", fecha);
                        }
                    }
                    break;
                }
            }
        },

        buscarPorFecha: function (fechaFin, fechaInicio, Periodo) {
            $("#lst-ingresos").empty();
            $("#lst-gastos").empty();
            var data = {
                fechafin: fechaFin,
                fechainicio: fechaInicio,
                fechames_ano: Periodo
            };
            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/IngresoEgreso/listaGastos.php',
                method: "GET",
                data: data,
                success: function (response) {
                    var sumaIngreso = 0;
                    var objListado = JSON.parse(response);
                    $(objListado).each(function (i, obj) {
                        var servicio = '';

                        if (obj.total == null) {
                            obj.total = 0.00
                        } else {
                            obj.total = obj.total;
                        }

                        servicio += '<tr>';
                        servicio += '<td><span>' + obj.nombre + '</span></td>';
                        servicio += '<td><span>' + obj.total + '</span></td>';
                        servicio += '</tr>';
                        sumaIngreso = parseFloat(obj.total) + sumaIngreso;
                        $("#lst-gastos").append(servicio);

                    });
                    console.log(sumaIngreso);

                    document.getElementById("totalIngresos").innerHTML = sumaIngreso;

                }
            });
            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/IngresoEgreso/listaIngresos.php',
                method: "GET",
                data: data,
                success: function (response) {
                    var sumaGastos = 0;
                    var objListado = JSON.parse(response);
                    $(objListado).each(function (i, obj) {
                        var venta = '';
                        if (obj.total == null) {
                            obj.total = 0.00
                        } else {
                            obj.total = obj.total;
                        }

                        venta += '<tr>';
                        venta += '<td><span>' + obj.nombre + '</span></td>';
                        venta += '<td><span>' + obj.total + '</span></td>';
                        venta += '</tr>';
                        sumaGastos = parseFloat(obj.total) + sumaGastos;

                        $("#lst-ingresos").append(venta);

                    });
                    console.log(sumaGastos);

                    document.getElementById("totalGastos").innerHTML = sumaGastos;

                }
            });

        },
    }
}();