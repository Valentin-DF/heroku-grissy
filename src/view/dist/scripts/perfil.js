var perfil = function () {

    return {
        obtenerPorId: function () {

            const storedToDos = localStorage.getItem("empleado");
            const emple = JSON.parse(storedToDos);

            $.ajax({
                url: "http://localhost:8080/Grissy/controllers/Personal/buscarPersonalPorId.php",
                method: "GET",
                data: {
                    id: emple.id
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
                        $("#cargo").val(obj.cargo);
                        $("#contacto").val(obj.contacto);
                        $("#fotos").val(obj.foto);

                        const correos = document.getElementById('correos') ;
                        correos.innerHTML= obj.correo;
                        const telefono = document.getElementById('telefono') ;
                        telefono.innerHTML= obj.contacto;
                        const codigos = document.getElementById('codigos') ;
                        codigos.innerHTML= obj.codigo;
                        const cargo = document.getElementById('nombreCargo') ;
                        cargo.innerHTML= obj.nombreCargo;
                        const foto =  document.getElementById('foto');
                        foto.setAttribute("src", obj.foto); 
                        // foto.src = ;
                        const nombres = document.getElementById('nombreCompleto') ;
                        nombres.innerHTML= obj.nombre+" "+obj.apellidoPaterno+" "+obj.apellidoMaterno;
                    });
                }
            })
        },

        actualizarPerfil: function(){

            var codigo = document.getElementById('codigos').innerHTML;

            var nombre = $("#nombre").val();
            var apellidoPaterno = $("#apellidoPaterno").val();
            var apellidoMaterno = $("#apellidoMaterno").val();
            var correo = $("#correo").val();
            var contrasena = $("#contrasena").val();
            var contacto = $("#contacto").val();
            var foto = $("#fotos").val();
            var direccion = $("#direccion").val();


            var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

            if ($("#fotos").val() == "") {
                var foto = "http://localhost:8080/Grissy/src/view/dist/assets/img/ES_121355.gif";
            }

            if (emailRegex.test($("#correo").val())) {
                if (contacto.length == 9 || contacto == '') {
                    $.ajax({
                        url: 'http://localhost:8080/Grissy/controllers/Personal/editarPerfil.php',
                        method: "POST",
                        data: {
                            codigo: codigo,
                            nombre: nombre,
                            apellidoMaterno: apellidoMaterno,
                            apellidoPaterno: apellidoPaterno,
                            correo: correo,
                            contrasena:contrasena,
                            direccion: direccion,
                            foto: foto,
                            contacto: contacto
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
                                if (obj.warning == "true") {

                                    location.reload();
                                }

                            });

                        }
                    });
                } else {
                    Toastify({
                        text: "Telefono Invalido",
                        duration: 3000,
                        close: true,
                        backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                    }).showToast();
                }
            } else {
                Toastify({
                    text: "Correo Invalido",
                    duration: 3000,
                    close: true,
                    backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                }).showToast();
            }
        },
        validarTelefono: function () {
            var telefono = $("#contacto").val();
            if (telefono.length > 9) {
                $("#contacto").val('');
            }
            if (telefono.length < 9) {
                $("#contacto").val('');
            }
        },


    }
}();