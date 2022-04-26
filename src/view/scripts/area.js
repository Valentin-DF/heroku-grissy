var area = function () {

    return {
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
                        area += '<div class="col-6 col-sm-6 col-lg-3 mt-2 mt-md-0 mb-md-0 mb-2">';
                        area += '   <button class="btn icon icon-left">';
                        area += '       <img width="200"';
                        area += '           height="200"';
                        area += '           src="'+obj.foto+'">';
                        area += '       <p>'+obj.nombre+'</p>';
                        area += '   </button>';
                        area += '</div>';
                        $("#lst-area").append(area);
                    });
                }
            })

        },
        guardarArea: function () {

            var codigo = $("#codigo").val();
            var nombre = $("#nombre").val();
            var foto = $("#foto").val();
            var descripcion = $("#descripcion").val();
            
            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/Area/guardarArea.php',
                method: "POST",
                data: {
                    codigo: codigo,
                    nombre: nombre,
                    descripcion: descripcion,
                    foto: foto
                },
                complete: function (response) { 
                    
                }
            });
        },
        eliminarArea: function (id) {
            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/Area/eliminarArea.php',
                method: "POST",
                data: {
                    id: id
                },
                complete: function (response) { 
                    
                }
            });
        }
    }
}();