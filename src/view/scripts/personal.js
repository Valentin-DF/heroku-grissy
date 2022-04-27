var personal = function () {

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
                        var personal = '';
                       
                        personal += '<div class="col-6 col-sm-6 col-lg-3 mt-2 mt-md-0 mb-md-0 mb-2">';
                        personal += '    <div class="btn icon icon-left" data-bs-toggle="modal"  >';
                        personal += '           <div class="row">';
                        personal += '            <img width="200" height="200" src="'+obj.foto+'">';
                        personal += '           </div>';
                        personal += '           <div class="row">';
                        personal += '            <span class="text-center">'+obj.nombre+' '+obj.apellidoPaterno+' '+obj.apellidoMaterno+'</span>';
                        personal += '           </div>';
                        personal += '           <div class="row">';
                        personal += '               <button type="button" class="btn btn-outline-info" data-bs-dismiss="modal" data-bs-dismiss="modal" onclick="" ><span class="fa-fw select-all fas"></span></button>';
                        personal += '               <button type="button" class="btn btn-outline-primary " data-bs-dismiss="modal" onclick="" ><span class="fa-fw select-all fas"></span> </button>';
                        personal += '               <button type="button" class="btn btn-outline-danger " data-bs-dismiss="modal" onclick="personal.eliminarPersonal(' + obj.id + ')" ><span class="fa-fw select-all fas"></span></button>';
                        personal += '           </div>';
                        personal += '        </div>';
                        personal += '</div>';

                        $("#lst-personal").append(personal);
                    });
                }
            })

        },
        consultarDocIdentidad: function () {
            var docIdentidad = $("#dni").val();

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
        eliminarPersonal: function (id) {
            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/Personal/eliminarPersonal.php',
                method: "POST",
                data: {
                    id: id
                },
                complete: function (response) {
                    console.log(response);
                    $("#lst-personal").empty();
                    personal.obtenerListaPersonal();
                }
            });
        },
        guardarPersonal: function () {
            var codigo = $("#codigo").val();
            var nombre = $("#nombre").val();
            var apellidoPaterno = $("#apellidoPaterno").val();
            var apellidoMaterno = $("#apellidoMaterno").val();
            var correo = $("#correo").val();
            var direccion = $("#direccion").val();
            var dni = $("#dni").val();
            var contrasena = $("#contrasena").val();
            var foto = $("#foto").val();
            var cargo = $("#cargo").val();
            var sueldo = $("#sueldo").val();
            var contacto = $("#contacto").val();
            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/Personal/guardarPersonal.php',
                method: "POST",
                data: {
                    codigo: codigo,
                    nombre: nombre,
                    apellidoMaterno: apellidoMaterno,
                    apellidoPaterno: apellidoPaterno,
                    correo: correo,
                    direccion: direccion,
                    dni: dni,
                    contrasena: contrasena,
                    foto: foto,
                    cargo: cargo,
                    sueldo: sueldo,
                    contacto: contacto
                },
                complete: function (response) {
                    console.log(response);
                    $("#lst-personal").empty();
                    personal.obtenerListaPersonal();
                }
            });
        },
        
    }
}();
