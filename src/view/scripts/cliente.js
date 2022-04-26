var cliente = function () {

    return {
        consultarDocIdentidad: function () {
            var docIdentidad = $("#docIdentidad").val();

            $.ajax({
                url: 'https://dniruc.apisperu.com/api/v1/dni/' + docIdentidad,
                method: "GET",
                data: {
                    token: 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImVzcGlub3phdmlsbGFyQGdtYWlsLmNvbSJ9._ZzB3eoj0J1OPDMRYGdeziwiEtoJSejb3ruXOgJPlEA'
                },
                complete: function (response) {
                    console.log(response.responseJSON);
                    $("#nombre").val(response.responseJSON.nombres);
                    $("#apellidoPaterno").val(response.responseJSON.apellidoPaterno);
                    $("#apellidoMaterno").val(response.responseJSON.apellidoMaterno);

                }
            });
        },
        obtenerListaCliente: function () {
            $.ajax({
                url: "http://localhost:8080/Grissy/controllers/Cliente/obtenerListaClientes.php",
                method: "GET",
                timeout: 0,
                success: function (response) {

                    console.log(response);

                    var objListado = JSON.parse(response);
                    $(objListado).each(function (i, obj) {
                        var cliente = '';
                        cliente += '<tr>';
                        cliente += '<td>' + obj.codigo + '</td>';
                        cliente += '<td>' + obj.docIdentidad + '</td>';
                        cliente += '<td>' + obj.nombre + '</td>';
                        cliente += '<td>' + obj.apellidoPaterno+' '+obj.apellidoMaterno+'</td>';
                        cliente += '<td>' + obj.fechaRegistro + '</td>';
                        if (obj.estado == 1) {
                            cliente += '<td><span class="badge bg-success">Activo</span></td>';
                        } else {
                            cliente += '<td><span class="badge bg-danger">Inactive</span></td>';
                        }
                        cliente += '<td><button class="btn btn-outline-primary"><span class="fa-fw select-all fas" onclick="cliente.editarCliente(' + obj.id + ')"></span></button>' +
                            '<button class="btn btn-outline-danger" onclick="cliente.eliminarCliente(' + obj.id + ')" ><span class="fa-fw select-all fas"></span></button></td>';
                        cliente += '</tr>';

                        $("#lst-cliente").append(cliente);
                    });
                }
            });

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
                }
            });
        },
        eliminarCliente: function (id) {
            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/Cliente/eliminarCliente.php',
                method: "POST",
                data: {
                    id: id
                },
                complete: function (response) {
                    console.log(response);
                }
            });
        },
        editarCliente: function (id) {
            var apellidoPaterno = $("#apelidoPaterno").val();
            var apellidoMaterno = $("#apelidoMaterno").val();
            var id = id;
            var condicioSunat = $("#condicionSunat").val();
            var direccion = $("#direccion").val();
            var docIdentidad = $("#docIdentidad").val();
            var estadoSunat = $("#estadoSunat").val();
            var nombre = $("#nombre").val();
            var telefono = $("#telefono").val();

            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/Cliente/editarCliente.php',
                method: "POST",
                data: {
                    id: id,
                    nombre: nombre,
                    apellidoMaterno: apellidoMaterno,
                    apellidoPaterno: apellidoPaterno,
                    condicioSunat: condicioSunat,
                    direccion: direccion,
                    docIdentidad: docIdentidad,
                    estadoSunat: estadoSunat,
                    telefono: telefono
                },
                complete: function (response) {
                    console.log(response);
                }
            });
        }
    }
}();