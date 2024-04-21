var rVentas = function () {

    return {


        obtenerListaV: function () {
            var fecha = rVentas.formatDate(new Date());


            $('#example').DataTable().destroy();
            $('#example').empty();
            var table = $('#example').DataTable({
                "ajax": {
                    "method": "GET",
                    "url": "http://localhost:8080/Grissy/controllers/Reporte/listaVenta.php",
                    "dataSrc": ""
                },
                "columns": [
                    { "title": "Fecha", "data": "fecha" },
                    { "title": "Codigo Venta", "data": "codigoVenta" },
                    {
                        "title": "Encargado", "render": function (data, type, row) {
                            return row.codigoEncargado + ' - ' + row.nombreEncargado;
                        }
                    },
                    {
                        "title": "Cliente", "render": function (data, type, row) {
                            return row.dni + ' - ' + row.cliente;
                        }
                    },
                    { "title": "Descripcion", "data": "descripcion" },
                    {
                        "title": "Monto", "data": "monto", "render": function (data, type, row) {
                            return 'S/. ' + row.monto;
                        }
                    },
                    {
                        "title": "Estado", "data": "estado", "render": function (data, type, row) {
                            if (row.estado == 2) {
                                return "Cobrado";
                            }
                            if (row.estado == 1) {
                                return "Pendiente";
                            }
                            if (row.estado == 0) {
                                return "Deshabilitado";
                            }
                        }
                    },
                ],
                "dom": "Bfrtip",
                "buttons": [
                    {
                        //Botón para Excel
                        extend: 'excelHtml5',
                        footer: true,
                        title: 'Seguimiento de las ventas hasta : ' + fecha,
                        filename: 'Seguimiento de las ventas hasta : ' + fecha,

                        //Aquí es donde generas el botón personalizado
                        text: '<span style="font-size: 22px;padding: 0px" class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
                    },
                    //Botón para PDF
                    {
                        extend: 'pdfHtml5',
                        download: 'open',
                        footer: true,
                        title: 'Seguimiento de las ventas hasta : ' + fecha,
                        filename: 'Seguimiento de las ventas hasta : ' + fecha,
                        text: '<span style="font-size: 22px;padding: 0px" class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
                        exportOptions: {
                            columns: [0, ':visible']
                        }
                    },
                    //Botón para copiar
                    {
                        extend: 'copyHtml5',
                        footer: true,
                        title: 'Seguimiento de las ventas hasta : ' + fecha,
                        filename: 'Seguimiento de las ventas hasta : ' + fecha,
                        text: '<span style="font-size: 22px;padding: 0px" class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
                        exportOptions: {
                            columns: [0, ':visible']
                        }
                    },
                    //Botón para print
                    {
                        extend: 'print',
                        footer: true,
                        filename: 'Seguimiento de las ventas hasta : ' + fecha,
                        text: '<span style="font-size: 22px;padding: 0px" class="badge badge-light"><i class="fas fa-print"></i></span>'
                    },
                    //Botón para cvs
                    {
                        extend: 'csvHtml5',
                        footer: true,
                        filename: 'Seguimiento de las ventas hasta : ' + fecha,
                        text: '<span style="font-size: 22px;padding: 0px" class="badge  badge-success"><i class="fas fa-file-csv"></i></span>'
                    },
                    {
                        extend: 'print',
                        text: 'Imprimir Seleccionados'
                    }
                ],
                "select": true,
                "order": [[1, 'desc']],
                "createdRow": function (row, data, index) {
                    if (data.estado == 2) {
                        $('td', row).css({
                            'background-color': '#E5FED7',
                            'color': '#008f39 ',
                            'font-size': '0.8rem'
                        });
                    }
                    if (data.estado == 1) {
                        $('td', row).css({
                            'background-color': '#FDFED7',
                            'color': '#f4a020',
                            'font-size': '0.8rem'
                        });
                    }
                    if (data.estado == 0) {
                        $('td', row).css({
                            'background-color': '#FED7D7',
                            'color': '#FF0000',
                            'font-size': '0.8rem'
                        });
                    }

                },
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
                },
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
        busquedaAvanzadav: function () {
            var fechainicio = $("#fechaInicio").val();
            var fechafinal = $("#fechaFinal").val();
            var idencargado = $("#idEncargado").val();
            $('#example').DataTable().destroy();
            $('#example').empty();
            var table = $('#example').DataTable({
                "ajax": {
                    "method": "GET",
                    "url": "http://localhost:8080/Grissy/controllers/Reporte/obtenerVenta.php",
                    "data": {
                        fechaInicio: fechainicio,
                        fechaFinal: fechafinal,
                        idEncargado: idencargado,
                    },
                    "dataSrc": ""
                },

                "columns": [
                    { "title": "Fecha", "data": "fecha" },
                    { "title": "Codigo Venta", "data": "codigoVenta" },
                    {
                        "title": "Encargado", "render": function (data, type, row) {
                            return row.codigoEncargado + ' - ' + row.nombreEncargado;
                        }
                    },
                    {
                        "title": "Cliente", "render": function (data, type, row) {
                            return row.dni + ' - ' + row.cliente;
                        }
                    },
                    { "title": "Descripcion", "data": "descripcion" },
                    {
                        "title": "Monto", "data": "monto", "render": function (data, type, row) {
                            return 'S/ ' + row.monto;
                        }
                    },
                    {
                        "title": "Estado", "data": "estado", "render": function (data, type, row) {
                            if (row.estado == 2) {
                                return "Cobrado";
                            }
                            if (row.estado == 1) {
                                return "Pendiente";
                            }
                            if (row.estado == 0) {
                                return "Deshabilitado";
                            }
                        }
                    },
                ],
                "order": [[1, 'desc']],
                "createdRow": function (row, data, index) {
                    if (data.estado == 2) {
                        $('td', row).css({
                            'background-color': '#E5FED7',
                            'color': '#008f39 ',
                            'font-size': '0.8rem'
                        });
                    }
                    if (data.estado == 1) {
                        $('td', row).css({
                            'background-color': '#FDFED7',
                            'color': '#f4a020',
                            'font-size': '0.8rem'
                        });
                    }
                    if (data.estado == 0) {
                        $('td', row).css({
                            'background-color': '#FED7D7',
                            'color': '#FF0000',
                            'font-size': '0.8rem'
                        });
                    }
                },
                "dom": "Bfrtip",
                "buttons": [
                    {
                        //Botón para Excel
                        extend: 'excelHtml5',
                        footer: true,
                        title: 'Seguimiento de las ventas' + fechainicio + '-' + fechafinal,
                        filename: 'Seguimiento de las ventas: ' + fechainicio + '-' + fechafinal,

                        //Aquí es donde generas el botón personalizado
                        text: '<span style="font-size: 22px;padding: 0px" class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
                    },
                    //Botón para PDF
                    {
                        extend: 'pdfHtml5',
                        download: 'open',
                        footer: true,
                        title: 'Seguimiento de las ventas' + fechainicio + '-' + fechafinal,
                        filename: 'Seguimiento de las ventas: ' + fechainicio + '-' + fechafinal,
                        text: '<span style="font-size: 22px;padding: 0px" class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
                        exportOptions: {
                            columns: [0, ':visible']
                        }
                    },
                    //Botón para copiar
                    {
                        extend: 'copyHtml5',
                        footer: true,
                        title: 'Seguimiento de las ventas' + fechainicio + '-' + fechafinal,
                        filename: 'Seguimiento de las ventas' + fechainicio + '-' + fechafinal,
                        text: '<span style="font-size: 22px;padding: 0px" class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
                        exportOptions: {
                            columns: [0, ':visible']
                        }
                    },
                    //Botón para print
                    {
                        extend: 'print',
                        footer: true,
                        filename: 'Seguimiento de las ventas' + fechainicio + '-' + fechafinal,
                        text: '<span style="font-size: 22px;padding: 0px" class="badge badge-light"><i class="fas fa-print"></i></span>'
                    },
                    //Botón para cvs
                    {
                        extend: 'csvHtml5',
                        footer: true,
                        filename: 'Seguimiento de las ventas' + fechainicio + '-' + fechafinal,
                        text: '<span style="font-size: 22px;padding: 0px"  class="badge  badge-success"><i class="fas fa-file-csv"></i></span>'
                    },
                    {
                        extend: 'print',
                        text: 'Imprimir Seleccionados'
                    }
                ],
                "select": true,
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
                },

            });
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
    }

}();