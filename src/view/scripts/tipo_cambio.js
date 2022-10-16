var tipocambio = function () {

    return {
  
        mostrarTipoCambio: function () {

            $.ajax({
                url: "http://localhost:8080/Grissy/controllers/TipoCambio/obtenerTipoCambio.php",
                method: "GET",
                timeout: 0,
                success: function (response) {

                    console.log(response);
                    let compra = [];
                    let venta = [];
                    let fecha = [];
                    var objListado = JSON.parse(response);
                    $(objListado).each(function (i, obj) {
                        compra.push(obj.compra);
                        venta.push(obj.venta);
                        fecha.push(obj.fecha);


                    });


                    console.log('Compra =>',compra);
                    console.log('Venta =>',venta);
                    console.log('Fecha =>',fecha);

                    var options = {
                        series: [{
                        name: 'Compra',
                        data: compra
                      }, {
                        name: 'Venta',
                        data: venta
                      }],
                        chart: {
                        height: 350,
                        type: 'area'
                      },

                      stroke: {
                        curve: 'smooth'
                      },
                      xaxis: {
                        title: {
                            text: 'Fechas'
                        },
                        categories: fecha
                      },
                      legend:{
                        position: 'top',
                        horizontalAlign: 'left'
                      },
                      yaxis: {
                        labels: {
                            formatter: function(val) {
                              return (val).toFixed(4) + ' S/';
                            },
                        }
                      },
                      fill:{
                        type: 'gradient'
                      }
                    };
                    var chart = new ApexCharts(document.querySelector("#chart"), options);
                    chart.render();
                }
            })


        },

        generarTablaTipoCambio:function(){
            $('#example').DataTable().destroy();
            $('#example').empty();
            var table = $('#example').DataTable({
            "ajax": {
                "method": "GET",
                "url": "http://localhost:8080/Grissy/controllers/TipoCambio/obtenerTipoCambio.php",
                "dataSrc": ""
            },
            "columns": [
                { "title": "Fecha", "data": "fecha" },
                { "title": "Compra", "data": "compra" },
                { "title": "Venta", "data": "venta" }
            ],
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
            },
        });

    }
    }
}();