var salario = function () {

    return {

        buscarPersonalPorDocumento: function () {
            var doc = $("#docIdentidad").val();

            $.ajax({
                url: "http://localhost:8080/Grissy/controllers/Personal/buscarPersonalPorDocumento.php",
                method: "GET",
                data: {
                    documento: doc,
                },
                timeout: 0,
                success: function (response) {

                    console.log(response);

                    var objListado = JSON.parse(response);
                    $(objListado).each(function (i, obj) {
                        $("#idPersonal").val(obj.id);
                        $("#nombrePersonal").val(obj.nombre);
                        $("#apellidosPersonal").val(obj.apellidoPaterno + ' ' + obj.apellidoMaterno);
                        $("#documentoPersonal").val(obj.dni);
                        $("#sueldoPersonal").val(obj.sueldo);
                    });
                    salario.operacionDeSueldo();

                }
            });
        },
        personalSinPagarEnElMes: function () {
            $('#example').DataTable().destroy();
            $('#example').empty();
            $('#example').DataTable({
                "ajax": {
                    "method": "GET",
                    "url": "http://localhost:8080/Grissy/controllers/Personal/sinPagarEnElMes.php",
                    "dataSrc": ""
                },
                "columns": [
                    { "title": "Documento", "data": "dni" },
                    { "title": "Nombre", "data": "nombre" },
                    { "title": "Fecha", "data": "fechaContrato" },
                ],
                "lengthMenu": [5, 10],
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
                },
                // "responsive": "true",
                // "dom": "Bfrtilp",<i class="fa-solid fa-trash-can"></i>
            });
        },

        operacionDeSueldo: function () {
            var salarioBase = $("#sueldoPersonal").val();
            if (salarioBase == "") {
                salarioBase = 0;
            }
            var bonificacionExtra = $("#bonificacionPersonal").val();

            if (bonificacionExtra == "") {
                bonificacionExtra = 0;
            }

            var descuentos = $("#descuentosPersonal").val();

            if (descuentos == "") {
                descuentos = 0;
            }

            var resultado = parseFloat(salarioBase) + parseFloat(bonificacionExtra) - parseFloat(descuentos);
            console.log(salarioBase, ' ', bonificacionExtra, ' ', descuentos);

            $("#sueldoTotalPersonal").val(resultado);
        },

        registrarSalario: function () {

            var idPersonal = $("#idPersonal").val();
            var salarioBase = $("#sueldoPersonal").val();
            var bonificacionExtra = $("#bonificacionPersonal").val();
            var descuentos = $("#descuentosPersonal").val();
            var total = $("#sueldoTotalPersonal").val();

            if (bonificacionExtra == "") {
                bonificacionExtra = 0;
            }
            if (descuentos == "") {
                descuentos = 0;
            }


            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/Personal/RegistrarSalarioDelPersonalEnElMes.php',
                method: "POST",
                data: {
                    idpersonal: idPersonal,
                    salariobase: salarioBase,
                    bonificacionextra: bonificacionExtra,
                    descuentos: descuentos,
                    totalsueldo: total

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
                        salario.personalSinPagarEnElMes();
                        salario.limpiarDatos();
                    });

                }
            });
        },
        limpiarDatos: function () {
            $("#idPersonal").val("");
            $("#nombrePersonal").val("");
            $("#apellidosPersonal").val("");
            $("#documentoPersonal").val("");
            $("#sueldoPersonal").val("");
            $("#bonificacionPersonal").val("");
            $("#descuentosPersonal").val("");
            $("#sueldoTotalPersonal").val("");
            $("#docIdentidad").val("");
        }

    }
}();