var seguimiento_venta = function () {

    return {
        mapSeguimiento: function () {
            const storedToDos = localStorage.getItem("empleado");
            const empleado = JSON.parse(storedToDos);
            var tmp = null;
            $.ajax({
                url: "http://localhost:8080/Grissy/controllers/Grafico/graficaSeguimientoVenta.php",
                method: "POST",
                data: {
                    idpersonal: empleado.id
                },

                success: function (response) {

                    console.log(response);

                    var objListado = JSON.parse(response);

                    tmp = new CanvasJS.Chart("chartContainer2", {
                        theme: "light2",
                        exportEnabled: true,
                        animationEnabled: true,
                        title: {
                            text: ""
                        },
                        axisY: {
                            includeZero: true,
                            prefix: "S/",
                            lineThickness: 0
                        },
                        toolTip: {
                            shared: true
                        },
                        legend: {
                            fontSize: 13
                        },
                        data: [
                            {
                                name: empleado.nombre + " " + empleado.apellidoPaterno,
                                showInLegend: "true",
                                yValueFormatString: "S/#,##0",
                                type: "column",
                                dataPoints: objListado
                            }
                        ]
                    });

                    tmp.render();

                }
            });
            return tmp;
        },
        tablaDetealles: function (estados) {
            console.log(estados);
            const storedToDos = localStorage.getItem("empleado");
            const empleado = JSON.parse(storedToDos);
            $('#example').DataTable().destroy();
            $('#example').empty();
            $('#example').DataTable({
                "ajax": {
                    "method": "POST",
                    "url": "http://localhost:8080/Grissy/controllers/Venta/obtenerVentasPorEstado.php",
                    "data": {
                        idempleado: empleado.id,
                        estado: estados
                    },
                    "dataSrc": ""
                },
                "columns": [
                    { "title": "Codigo", "data": "codigo" },
                    { "title": "Fecha", "data": "fecha" },
                    { "title": "Cliente", "data": "cliente" },
                    { "title": "SubTotal", "data": "subTotal" },
                    { "title": "IGV", "data": "igv" },
                    { "title": "Total", "data": "total" },
                ],
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
                },
                "responsive": "true",
                "dom": "Bfrtilp",
            });
        },
    }
}();
