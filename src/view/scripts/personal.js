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
                        personal += '            <img width="200" height="200" src="' + obj.foto + '">';
                        personal += '           </div>';
                        personal += '           <div class="row">';
                        personal += '            <span class="text-center">' + obj.nombre + ' ' + obj.apellidoPaterno + ' ' + obj.apellidoMaterno + '</span>';
                        personal += '           </div>';
                        personal += '           <div class="col">';
                        personal += '               <button type="button" class="btn btn-outline-info" data-bs-toggle="modal"  data-bs-target="#cartillaPersonal-' + obj.id + '" ><span class="fa-fw select-all fas"></span></button>';
                        personal += '               <button type="button" class="btn btn-outline-primary " data-bs-toggle="modal" data-bs-target="#agregarPersonal" onclick="personal.obtenerPorId(' + obj.id + ')" ><span class="fa-fw select-all fas"></span> </button>';
                        personal += '               <button type="button" class="btn btn-outline-danger " data-bs-dismiss="modal" onclick="personal.eliminarPersonal(' + obj.id + ')" ><span class="fa-fw select-all fas"></span></button>';
                        personal += '           </div>';
                        personal += '        </div>';
                        personal += '</div>';


                        personal += '<div class="modal fade text-left"  id="cartillaPersonal-' + obj.id + '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">';
                        personal += '<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">';
                        personal += '    <div class="modal-content">';
                        personal += '        <div class="modal-header">';
                        personal += '           <h5 class="modal-title" id="myModalLabel1">' + obj.nombre + '</h5>';
                        if (obj.estado == 1) {
                            personal += '<td><span class="badge bg-success rounded-pill">Activo</span></td>';
                        } else {
                            personal += '<td><span class="badge bg-danger rounded-pill">Inactive</span></td>';
                        }
                        personal += '        </div>';
                        personal += '        <div class="modal-body">';
                        personal += '            <div class="row">';
                        personal += '                <div class="col-sm-8">';
                        personal += '                    <p> NOMBRE:     ' + obj.nombre + '</p>';
                        personal += '                    <p> APELLIDOS:  ' + obj.apellidoPaterno + ' ' + obj.apellidoMaterno + '</p>';
                        personal += '                    <p> CARGO:      ' + obj.cargo + '</p>';
                        personal += '                    <p> TELEFONO:   ' + obj.contacto + '</p>';
                        personal += '                    <p> DIRECCION:  ' + obj.direccion + '</p>';
                        personal += '                    <p> CORREO:     ' + obj.correo + '</p>';
                        personal += '                </div>';
                        personal += '                <div class="col-sm-4">';
                        personal += '                   <img width="200" height="200" src="' + obj.foto + '">';
                        personal += '                </div>';
                        personal += '            </div>';
                        personal += '        </div>';
                        personal += '       <div class="modal-footer" >';
                        personal += '           <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><span class="d-none d-sm-block">Close</span></button>';
                        personal += '       </div>';
                        personal += '    </div>';
                        personal += '</div>';
                        personal += '</div>';



                        $("#lst-personal").append(personal);
                    });
                }
            })

        },
        consultarDocIdentidad: function () {
            var docIdentidad = $("#dni").val();
            if (docIdentidad.length == 8) {
                $.ajax({
                    url: 'https://dniruc.apisperu.com/api/v1/dni/' + docIdentidad,
                    method: "GET",
                    data: {
                        token: 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImVzcGlub3phdmlsbGFyQGdtYWlsLmNvbSJ9._ZzB3eoj0J1OPDMRYGdeziwiEtoJSejb3ruXOgJPlEA'
                    },
                    complete: function (response) {
                        console.log(response.responseJSON);
                        $("#codigo").val('D-' + response.responseJSON.dni);
                        $("#nombre").val(response.responseJSON.nombres);
                        $("#apellidoPaterno").val(response.responseJSON.apellidoPaterno);
                        $("#apellidoMaterno").val(response.responseJSON.apellidoMaterno);

                    }
                });
            }
            if (docIdentidad.length > 8) {
                $("#dni").val('');
                Toastify({
                    text: "El DNI ingresado es invalido",
                    duration: 3000,
                    close: true,
                    backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                }).showToast();
            }

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
            var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

            if ($("#dni").val() != "" && $("#dni").val().length == 8) {
                if ($("#nombre").val() != "") {
                    if (emailRegex.test($("#correo").val())) {
                        if ($("#contacto").val().length == 9) {
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
                                    personal.limpiar();
                                }
                            });
                            $.ajax({
                                url: 'http://localhost:8080/Grissy/controllers/Permisos/guardarPermisos.php',
                                method: "POST",
                                data: {
                                    idpersonal: codigo,
                                    p_grissyCliente: 0,
                                    p_grissyPersonal: 0,
                                    p_grissyProductoEmp: 0,
                                    p_grissyProveedor: 0,
                                    p_grissyVenta: 0,
                                    p_grissyArea: 0,
                                    p_grissyConfiguraciones: 0
                                },
                                complete: function (response) {
                                    console.log(response);
                                }
                            });
                            $('#agregarPersonal').modal('hide');
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
                } else {
                    Toastify({
                        text: "Se debe registrar un nombre de referencia",
                        duration: 3000,
                        close: true,
                        backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                    }).showToast();
                }
            } else {
                Toastify({
                    text: "Ingrese un documento de identidad valido",
                    duration: 3000,
                    close: true,
                    backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                }).showToast();
            }

        },
        obtenerPorId: function (id) {
            var btn_2 = document.getElementById('editar');
            var btn_1 = document.getElementById('guardar');
            btn_2.style.display = 'inline';
            btn_1.style.display = 'none';
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
                        $("#foto").val(obj.foto);
                        $("#cargo").val(obj.cargo);
                        $("#sueldo").val(obj.sueldo);
                        $("#contacto").val(obj.contacto);

                    });
                }
            })
        },
        editarPersonal: function () {

            var codigo = $("#codigo").val();
            var nombre = $("#nombre").val();
            var apellidoPaterno = $("#apellidoPaterno").val();
            var apellidoMaterno = $("#apellidoMaterno").val();
            var correo = $("#correo").val();
            var direccion = $("#direccion").val();
            var dni = $("#dni").val();
            var foto = $("#foto").val();
            var cargo = $("#cargo").val();
            var sueldo = $("#sueldo").val();
            var contacto = $("#contacto").val();

            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/Personal/editarPersonal.php',
                method: "POST",
                data: {
                    codigo: codigo,
                    nombre: nombre,
                    apellidoMaterno: apellidoMaterno,
                    apellidoPaterno: apellidoPaterno,
                    correo: correo,
                    direccion: direccion,
                    dni: dni,
                    foto: foto,
                    cargo: cargo,
                    sueldo: sueldo,
                    contacto: contacto
                },
                complete: function (response) {
                    console.log(response);
                    $("#lst-personal").empty();
                    personal.obtenerListaPersonal();
                    personal.limpiar();
                }
            });
        },
        limpiar: function () {
            $("#codigo").val("");
            $("#nombre").val("");
            $("#apellidoPaterno").val("");
            $("#apellidoMaterno").val("");
            $("#correo").val("");
            $("#direccion").val("");
            $("#dni").val("");
            $("#contrasena").val("");
            $("#foto").val("");
            $("#cargo").val("");
            $("#sueldo").val("");
            $("#contacto").val("");
        },
        en_guardar: function () {
            this.limpiar();
            var btn_2 = document.getElementById('editar');
            var btn_1 = document.getElementById('guardar');
            btn_2.style.display = 'none';
            btn_1.style.display = 'inline';
        },
        validarCorreo: function () {

            emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
            if (emailRegex.test($("#correo").val())) {
                Toastify({
                    text: "Correo correctamente Ingresado",
                    duration: 3000,
                    close: true,
                    backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                }).showToast();
            } else {
                Toastify({
                    text: "Correo incorrecto",
                    duration: 3000,
                    close: true,
                    backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                }).showToast();
            }
        },
        validarCantidades: function () {
            var doc = $("#dni").val();

            console.log("dni: ", doc);
            if (doc.length < 8) {
                Toastify({
                    text: "El DNI ingresado es valido",
                    duration: 3000,
                    close: true,
                    backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                }).showToast();
            }
            if (doc.length > 8) {
                $("#dni").val('');
                Toastify({
                    text: "El DNI ingresado es invalido",
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
                Toastify({
                    text: "El telefono ingresado es invalido",
                    duration: 3000,
                    close: true,
                    backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                }).showToast();
            }
            if (telefono.length < 9) {
                $("#contacto").val('');
                Toastify({
                    text: "El telefono ingresado es invalido",
                    duration: 3000,
                    close: true,
                    backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                }).showToast();
            }
            if (telefono.length == 9) {
                Toastify({
                    text: "Correcto",
                    duration: 3000,
                    close: true,
                    backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                }).showToast();
            }
        }

    }
}();
