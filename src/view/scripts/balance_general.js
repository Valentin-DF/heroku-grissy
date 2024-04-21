var ingresos_egresos = function () {

    return {



        mostrar: function () {
            var anio = $("#anio").val();
            ingresos_egresos.buscarPorFecha(anio);

        },

        buscarPorFecha: function (fechanio) {
            $("#lst-activos").empty();
            $("#lst-pasivos").empty();
            var data = {
                anio: fechanio,
            };
            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/IngresoEgreso/listaActivos.php',
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
                        $("#lst-activos").append(servicio);

                    });
                    console.log(sumaIngreso);

                    document.getElementById("totalActivos").innerHTML = (sumaIngreso).toFixed(4);

                }
            });
            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/IngresoEgreso/listaPasivos.php',
                method: "GET",
                data: data,
                success: function (response) {
                    var sumaGastos = 0.00;
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

                        $("#lst-pasivos").append(venta);

                    });
                    console.log(sumaGastos);

                    document.getElementById("totalPasivos").innerHTML = (sumaGastos).toFixed(4);

                }
            });

        },

    }
}();