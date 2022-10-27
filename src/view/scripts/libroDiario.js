var libro_diario = function () {

    return {
        buscarPorFecha: function (fechaDelDia) {
            $("#lst-libroDiario").empty();
            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/LibroDiario/listaLibroDiario.php',
                method: "GET",
                data: {
                    fecha: fechaDelDia
                },
                success: function (response) {
                    var sumaHaber = 0;
                    var sumaDebe = 0;
                    console.log(response);
                    var objListado = JSON.parse(response);
                    $(objListado).each(function (i, obj) {
                        var servicio = '';

                        var auxDebe = 0;
                        var auxHaber = 0;

                        if (obj.debe == null) {
                            auxDebe = 0.00;
                        }
                        else if (obj.debe == "") {
                            auxDebe = 0.00;
                        } else {
                            auxDebe = parseFloat(obj.debe);
                        }

                        if (obj.haber == null) {
                            auxHaber = 0.00;
                        }
                        else if (obj.haber == "") {
                            auxHaber = 0.00;
                        } else {
                            auxHaber = parseFloat(obj.haber);
                        }


                        sumaHaber = auxHaber + sumaHaber;
                        sumaDebe = auxDebe + sumaDebe;

                        if (obj.debe == null) {
                            obj.debe = '0.000';
                        } if (obj.haber == null) {
                            obj.haber = '0.000';
                        }

                        servicio += '<tr>';
                        servicio += '<td><span>' + obj.descripcion + '</span></td>';
                        servicio += '<td><span>' + obj.debe + '</span></td>';
                        servicio += '<td><span>' + obj.haber + '</span></td>';
                        servicio += '</tr>';


                        $("#lst-libroDiario").append(servicio);

                    });
                    console.log('duma haber => ', sumaHaber);
                    console.log('duma debe  => ', sumaDebe);

                    document.getElementById("totalDebe").innerHTML = (sumaDebe).toFixed(4);
                    document.getElementById("totalHaber").innerHTML = (sumaHaber).toFixed(4);

                    if (sumaHaber == sumaDebe && sumaDebe != 0 && sumaHaber != 0) {
                        document.getElementById("estadoContable").innerHTML = "BALANCE CUADRADO";
                        document.getElementById("estadoContable").style.backgroundColor = "#2ecc71";
                    } if (sumaHaber == sumaDebe && sumaDebe == 0 && sumaHaber == 0) {
                        document.getElementById("estadoContable").innerHTML = "";
                        document.getElementById("estadoContable").style.backgroundColor = "#ffffff";
                    } else {
                        document.getElementById("estadoContable").innerHTML = "BALANCE DESCUADRADO";
                        document.getElementById("estadoContable").style.backgroundColor = "#cc2e2e";
                    }
                }
            });
        },
        formatDate: function (date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2)
                month = '0' + month;
            if (day.length < 2)
                day = '0' + day;

            return [year, month, day].join('-');
        },

        mostrar: function () {
            var fecha = $("#fecha").val();
            if (fecha == "") {
                Toastify({
                    text: "Ingrese una fecha",
                    duration: 3000,
                    close: true,
                    backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                }).showToast();
            } else {
                libro_diario.buscarPorFecha(fecha);
            }
        },
    }
}();