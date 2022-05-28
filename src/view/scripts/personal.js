var personal = function () {

    return {
        obtenerListaPersonal: function () {
            var pers;
            $.ajax({
                url: "http://localhost:8080/Grissy/controllers/Personal/obtenerListaPersonal.php",
                method: "GET",
                timeout: 0,
                success: function (response) {

                    console.log(response);

                    var objListado = JSON.parse(response);
                    $(objListado).each(function (i, obj) {
                        var personals = '';

                        personals += '<div class="col-4 mb-4">';
                        personals += '<div class="card">';
                        personals += '    <div class="row g-0">';
                        personals += '        <div class="caja col-md-5"><img class="img-fluid" src="' + obj.foto + '" alt="..." /></div>';
                        personals += '        <div class="col-md-7">';
                        personals += '            <div class="card-body">';
                        personals += '                <h5 class="card-title text-center mb-3"><em>' + obj.nombre + ' ' + obj.apellidoPaterno + ' ' + obj.apellidoMaterno + '</em></h5>';
                        personals += '                 <p class="card-text text-center mb-3"><em>(' + obj.nombreCargo + ')</em></p>';
                        personals += '                <div class="card-footer  text-center">';
                        personals += '                    <div >';
                        personals += '                        <button type="button" class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#cartillaPersonal-' + obj.id + '"><span class="fa-fw select-all fas"></span></button>';
                        personals += '                        <button type="button" class="btn btn-outline-primary btn-sm " data-bs-toggle="modal" data-bs-target="#agregarPersonal" onclick="personal.obtenerPorId(' + obj.id + ')"><span class="fa-fw select-all fas"></span> </button>';
                        personals += '                    </div>';
                        personals += '                    <div>';
                        personals += '                        <button type="button" class="btn btn-outline-danger btn-sm " onclick="personal.eliminarPersonal(' + obj.id + ', 0)"><span class="fa-fw select-all fas"></span></button>';
                        personals += '                        <button type="button" class="btn btn-outline-success btn-sm "  onclick="personal.eliminarPersonal(' + obj.id + ', 1)"><em class="far fa-check-circle"></em></button>';
                        personals += '                    </div>';
                        personals += '                </div>';
                        personals += '            </div>';
                        personals += '        </div>';
                        personals += '    </div>';
                        personals += '</div>';
                        personals += '</div>';
                        personals += '<div class="modal fade text-left"  id="cartillaPersonal-' + obj.id + '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">';
                        personals += '<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">';
                        personals += '    <div class="modal-content">';
                        personals += '        <div class="modal-header">';
                        personals += '           <h5 class="modal-title" id="myModalLabel1">' + obj.nombre + '</h5>';
                        if (obj.estado == 1) {
                            personals += '<td><span class="badge bg-success rounded-pill">Activo</span></td>';
                        } else {
                            personals += '<td><span class="badge bg-danger rounded-pill">Inactive</span></td>';
                        }
                        personals += '        </div>';
                        personals += '        <div class="modal-body">';
                        personals += '            <div class="row">';
                        personals += '                <div class="col-sm-8">';
                        personals += '                    <p> NOMBRE:     ' + obj.nombre + '</p>';
                        personals += '                    <p> APELLIDOS:  ' + obj.apellidoPaterno + ' ' + obj.apellidoMaterno + '</p>';
                        personals += '                    <p> CARGO:      ' + obj.nombreCargo + '</p>';
                        personals += '                    <p> TELEFONO:   ' + obj.contacto + '</p>';
                        personals += '                    <p> DIRECCION:  ' + obj.direccion + '</p>';
                        personals += '                    <p> CORREO:     ' + obj.correo + '</p>';
                        personals += '                </div>';
                        personals += '                <div class="col-sm-4">';
                        personals += '                   <img width="200" height="200" src="' + obj.foto + '">';
                        personals += '                </div>';
                        personals += '            </div>';
                        personals += '        </div>';
                        personals += '       <div class="modal-footer" >';
                        personals += '           <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><span class="d-none d-sm-block">Close</span></button>';
                        personals += '       </div>';
                        personals += '    </div>';
                        personals += '</div>';
                        personals += '</div>';



                        $("#lst-personal").append(personals);
                    });
                }
            })

        },

        nombreDeCargo: function (id) {
            var nombre = '';
            $.ajax({
                url: "http://localhost:8080/Grissy/controllers/Cargo/buscarCargoPorId.php",
                method: "GET",
                timeout: 0,
                data: {
                    id: id
                },
                success: function (responses) {
                    var objListadoC = JSON.parse(responses);
                    $(objListadoC).each(function (i, objsC) {
                        nombre = objsC.nombre;
                        console.log(nombre);

                    });
                }

            });
            return nombre;
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
        eliminarPersonal: function (id, estado) {
            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/Personal/eliminarPersonal.php',
                method: "POST",
                data: {
                    id: id,
                    estado: estado
                },
                success: function (response) {


                    var objListado = JSON.parse(response);
                    $(objListado).each(function (i, obj) {
                        Toastify({
                            text: obj.msj,
                            duration: 3000,
                            close: true,
                            backgroundColor: obj.color,
                        }).showToast();
                        $("#lst-personal").empty();
                        personal.obtenerListaPersonal();
                    });
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
            var idcargo = $("#idcargo").val();
            var sueldo = $("#sueldo").val();
            var contacto = $("#contacto").val();
            var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

            if ($("#foto").val() == "") {
                var foto = "http://localhost:8080/Grissy/src/assets/img/ES_121355.gif";
            }

            if (emailRegex.test($("#correo").val()) || correo == '') {
                if (contacto.length == 9 || contacto == '') {

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
                            idcargo: idcargo,
                            sueldo: sueldo,
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
                                    $("#lst-personal").empty();
                                    personal.obtenerListaPersonal();
                                    personal.limpiar();
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
                                        success: function (response) {
                                            console.log(response);
                                        }
                                    });
                                    $('#agregarPersonal').modal('hide');
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

        obtenerPorId: function (id) {
            var btn_2 = document.getElementById('editar');
            var btn_1 = document.getElementById('guardar');
            var inpt1 = document.getElementById('sueldo');
            var inpt2 = document.getElementById('contrasena');
            var label1 = document.getElementById('noEdit1');
            var label2 = document.getElementById('noEdit2');
            btn_2.style.display = 'inline';
            btn_1.style.display = 'none';
            inpt1.style.display = 'none'
            inpt2.style.display = 'none';
            label1.style.display = 'none';
            label2.style.display = 'none';
            this.blockEditar();
            document.getElementById("dni").disabled = true;
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
                        $("#idcargo").val(obj.idcargo);
                        $("#sueldo").val(obj.sueldo);
                        $("#contacto").val(obj.contacto);
                        if (obj.estado == 1) {

                            document.getElementById("estadoC").innerHTML = "Activo";
                            document.getElementById("estadoC").style.backgroundColor = "#2ecc71";
                        } else {
                            document.getElementById("estadoC").innerHTML = "Inactivo";
                            document.getElementById("estadoC").style.backgroundColor = "#cc2e2e";

                        }

                    });
                }
            });

        },
        blockEditar: function () {
            document.getElementById("dni").disabled = true;
            document.getElementById("nombre").disabled = true;
            document.getElementById("apellidoPaterno").disabled = true;
            document.getElementById("apellidoMaterno").disabled = true;

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
            var idcargo = $("#idcargo").val();
            var sueldo = $("#sueldo").val();
            var contacto = $("#contacto").val();
            var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

            if ($("#foto").val() == "") {
                var foto = "http://localhost:8080/Grissy/src/assets/img/ES_121355.gif";
            }

            if (emailRegex.test($("#correo").val())) {
                if (contacto.length == 9 || contacto == '') {
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
                            idcargo: idcargo,
                            sueldo: sueldo,
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
                                    $("#lst-personal").empty();
                                    personal.obtenerListaPersonal();
                                    personal.limpiar();
                                    $('#agregarPersonal').modal('hide');
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
            $("#idcargo").val("");
            $("#sueldo").val("");
            $("#contacto").val("");
            document.getElementById("estadoC").innerHTML = "";
            document.getElementById("estadoC").style.backgroundColor = "transparent";
        },

        en_guardar: function () {
            this.limpiar();
            var btn_2 = document.getElementById('editar');
            var btn_1 = document.getElementById('guardar');
            var inpt1 = document.getElementById('sueldo');
            var inpt2 = document.getElementById('contrasena');
            var label1 = document.getElementById('noEdit1');
            var label2 = document.getElementById('noEdit2');

            btn_2.style.display = 'none';
            btn_1.style.display = 'inline';
            inpt1.style.display = 'inline'
            inpt2.style.display = 'inline';
            label1.style.display = 'inline';
            label2.style.display = 'inline';
            document.getElementById("dni").disabled = false;

            this.desblockGuardar();
        },

        desblockGuardar: function () {
            document.getElementById("dni").disabled = false;
            document.getElementById("nombre").disabled = false;
            document.getElementById("apellidoPaterno").disabled = false;
            document.getElementById("apellidoMaterno").disabled = false;
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
            }
            if (telefono.length < 9) {
                $("#contacto").val('');
            }
        },

        obtenerListaCargo: function () {var cargo = '';
        
            $.ajax({
                url: "http://localhost:8080/Grissy/controllers/Cargo/obtenerListaCargo.php",
                method: "GET",
                timeout: 0,
                success: function (response) {

                    console.log(response);

                    var objListado = JSON.parse(response);
                    $(objListado).each(function (i, obj) {
                        if (obj.estado == 1) {
                            
                            cargo = '<option class="text-blue" value="' + obj.id + '">' + obj.nombre + '</option>';


                        } else {
                            cargo = '<option disabled class="text-pink" value="' + obj.id + '">' + obj.nombre + '</option>';

                        }
                        $("#idcargo").append(cargo);
                        // if (obj.estado == 1) {
                        //     area = '<option class="text-blue" value="' + obj.id + '">' + obj.nombre + '</option>';
                        // } else {
                        //     area = '<option disabled class="text-pink" value="' + obj.id + '">' + obj.nombre + '</option>';
                        // }

                    });
                }
            })
        },

    }
}();
