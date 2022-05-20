var perfil = function () {

    return {
        obtenerPorId: function (id) {
            $.ajax({
                url: "http://localhost:8080/Grissy/controllers/Personal/buscarPersonalPorId.php",
                method: "GET",
                data: {
                    id: id
                },
                timeout: 0,
                success: function (response) {

                    console.log(response);

                    var objListado = JSON.parse(response);
                    $(objListado).each(function (i, obj) {

                        $("#codigo").val(obj.codigo);
                        $("#nombre").val(obj.nombre);
                        $("#apellidoPaterno").val(obj.apellidoPaterno);
                        $("#apellidoMaterno").val(obj.apellidoMaterno);
                        $("#correo").val(obj.correo);
                        $("#direccion").val(obj.direccion);
                        $("#dni").val(obj.dni);
                        $("#contrasena").val(obj.contrasena);
                        // $("#foto").val(obj.foto);
                        $("#cargo").val(obj.cargo);
                        $("#contacto").val(obj.contacto);


                        const correos = document.getElementById('correos') ;
                        correos.innerHTML= obj.correo;
                        const telefono = document.getElementById('telefono') ;
                        telefono.innerHTML= obj.contacto;
                        const codigos = document.getElementById('codigos') ;
                        codigos.innerHTML= obj.codigo;
                        const foto =  document.getElementById('foto');
                        foto.setAttribute("src", obj.foto); 
                        // foto.src = ;
                        const nombres = document.getElementById('nombreCompleto') ;
                        nombres.innerHTML= obj.nombre+" "+obj.apellidoPaterno+" "+obj.apellidoMaterno;
                    });
                }
            })
        },

    }
}();