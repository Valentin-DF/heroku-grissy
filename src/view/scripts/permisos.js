var permisos = function () {

    return {
        obtenerListaPersonal: function () {
            $.ajax({
                url: "http://localhost:8080/Grissy/controllers/Personal/obtenerListaPersonal.php",
                method: "GET",
                timeout: 0,
                success: function (response) {

                    console.log(response);

                    var objListado = JSON.parse(response);
                    $(objListado).each(function (i, obj) {
                        if (obj.estado == 1) {
                            var personal = '';
                            personal = '<option value="' + obj.id + '">' + obj.nombre + ' ' + obj.apellidoPaterno + ' ' + obj.apellidoMaterno + '</option>';

                            $("#lst-personal").append(personal);
                        }
                    });
                }
            })

        },
        seleccionar: function () {
            if (document.getElementById("lst-personal").selectedIndex == 0) {
                this.limpiar();
                this.desabilitar();
            } else {

                this.habilitar();
                var idpersonal = $("#lst-personal").val();
                $.ajax({
                    url: "http://localhost:8080/Grissy/controllers/Permisos/buscarPermisosPorPersonal.php",
                    method: "GET",
                    data: {
                        idpersonal: idpersonal
                    },
                    timeout: 0,
                    success: function (response) {

                        console.log(response);

                        var objListado = JSON.parse(response);
                        $(objListado).each(function (i, obj) {

                            document.getElementById("p_grissyCliente").checked = obj.p_grissyCliente;
                            document.getElementById("p_grissyPersonal").checked = obj.p_grissyPersonal;
                            document.getElementById("p_grissyProductoEmp").checked = obj.p_grissyProductoEmp;
                            document.getElementById("p_grissyProveedor").checked = obj.p_grissyProveedor;
                            document.getElementById("p_grissyVenta").checked = obj.p_grissyVenta;
                            document.getElementById("p_grissyArea").checked = obj.p_grissyArea;
                            document.getElementById("p_grissyConfiguraciones").checked = obj.p_grissyConfiguraciones;

                        });
                    }
                })
            }
        },
        guardarCambios: function () {
            var idpersonal = $("#lst-personal").val();
            if (document.getElementById("p_grissyCliente").checked == true) {
                var p_grissyCliente = 1;
            } else {
                var p_grissyCliente = 0;
            }
            if (document.getElementById("p_grissyPersonal").checked == true) {
                var p_grissyPersonal = 1;
            } else {
                var p_grissyPersonal = 0;
            }
            if (document.getElementById("p_grissyProductoEmp").checked == true) {
                var p_grissyProductoEmp = 1;
            } else {
                var p_grissyProductoEmp = 0;
            }
            if (document.getElementById("p_grissyProveedor").checked == true) {
                var p_grissyProveedor = 1;
            } else {
                var p_grissyProveedor = 0;
            }
            if (document.getElementById("p_grissyVenta").checked == true) {
                var p_grissyVenta = 1;
            } else {
                var p_grissyVenta = 0;
            }
            if (document.getElementById("p_grissyArea").checked == true) {
                var p_grissyArea = 1;
            } else {
                var p_grissyArea = 0;
            }
            if (document.getElementById("p_grissyConfiguraciones").checked == true) {
                var p_grissyConfiguraciones = 1;
            } else {
                var p_grissyConfiguraciones = 0;
            }

            $.ajax({
                url: "http://localhost:8080/Grissy/controllers/Permisos/guardarCambios.php",
                method: "POST",
                timeout: 0,
                data: {
                    idpersonal: idpersonal,
                    p_grissyCliente: p_grissyCliente,
                    p_grissyPersonal: p_grissyPersonal,
                    p_grissyProductoEmp: p_grissyProductoEmp,
                    p_grissyProveedor: p_grissyProveedor,
                    p_grissyVenta: p_grissyVenta,
                    p_grissyArea: p_grissyArea,
                    p_grissyConfiguraciones: p_grissyConfiguraciones
                },
                success: function (response) {

                    console.log(response);
                    permisos.limpiar();
                }
            })
        },
        limpiar: function () {

            document.getElementById("lst-personal").selectedIndex = 0;
            document.getElementById("p_grissyCliente").checked = 0;
            document.getElementById("p_grissyPersonal").checked = 0;
            document.getElementById("p_grissyProductoEmp").checked = 0;
            document.getElementById("p_grissyProveedor").checked = 0;
            document.getElementById("p_grissyVenta").checked = 0;
            document.getElementById("p_grissyArea").checked = 0;
            document.getElementById("p_grissyConfiguraciones").checked = 0;
        },
        desabilitar: function() {
            document.getElementById("p_grissyCliente").disabled = true;
            document.getElementById("p_grissyPersonal").disabled = true;
            document.getElementById("p_grissyProductoEmp").disabled = true;
            document.getElementById("p_grissyProveedor").disabled = true;
            document.getElementById("p_grissyVenta").disabled = true;
            document.getElementById("p_grissyArea").disabled = true;
            document.getElementById("p_grissyConfiguraciones").disabled = true;
            document.getElementById("guardar").disabled = true;
        },
        habilitar: function() {
            document.getElementById("p_grissyCliente").disabled = false;
            document.getElementById("p_grissyPersonal").disabled = false;
            document.getElementById("p_grissyProductoEmp").disabled = false;
            document.getElementById("p_grissyProveedor").disabled = false;
            document.getElementById("p_grissyVenta").disabled = false;
            document.getElementById("p_grissyArea").disabled = false;
            document.getElementById("p_grissyConfiguraciones").disabled = false;
            document.getElementById("guardar").disabled = false;
        },

    }

}();
