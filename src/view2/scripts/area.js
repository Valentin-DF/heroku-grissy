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
                        area += '   <button class="btn icon icon-left" data-bs-toggle="modal" data-bs-target="#cartillaArea-' + obj.id + '" >';
                        area += '       <img width="200"';
                        area += '           height="200"';
                        area += '           src="' + obj.foto + '">';
                        area += '       <h4 class="card-title mb-3">' + obj.nombre + '</h4>';
                        area += '   </button>';

                        area += '</div>';
                        area += '<div class="modal fade text-left"  id="cartillaArea-' + obj.id + '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">';
                        area += '<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">';
                        area += '    <div class="modal-content">';
                        area += '        <div class="modal-header">';
                        area += '           <h5 class="modal-title" id="myModalLabel1">' + obj.nombre + '</h5>';
                        if (obj.estado == 1) {
                            area += '<td><span class="badge bg-success rounded-pill">Activo</span></td>';
                        } else {
                            area += '<td><span class="badge bg-danger rounded-pill">Inactive</span></td>';
                        }
                        area += '        </div>';
                        area += '        <div class="modal-body">';
                        area += '            <div class="row">';
                        area += '                <div class="col-sm-8">';
                        area += '                    <p>' + obj.descripcion + '</p>';
                        area += '                </div>';
                        area += '                <div class="col-sm-4">';
                        area += '                   <img width="200" height="200" src="' + obj.foto + '">';
                        area += '                </div>';
                        area += '            </div>';
                        area += '        </div>';
                        area += '       <div class="modal-footer" >';
                        if (obj.estado == 1) {
                            area += '           <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#agregarArea" onclick="area.obtenerPorId(' + obj.id + ')"><span class="fa-fw select-all fas"></span> Editar </button>';
                            // area += '           <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal" onclick="area.reintegrarArea(' + obj.id + ')" ><span class="fa-fw select-all fas"></span> Activar </button>';
                            area += '           <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" onclick="area.eliminarArea(' + obj.id + ')" ><span class="fa-fw select-all fas"></span> Desactivar </button>';
                            area += '           <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><span class="d-none d-sm-block">Close</span></button>';
                        } else {
                            // area += '           <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#agregarArea" onclick="area.obtenerPorId(' + obj.id + ')"><span class="fa-fw select-all fas"></span> Editar </button>';
                            area += '           <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal" onclick="area.reintegrarArea(' + obj.id + ')" ><span class="fa-fw select-all fas"></span> Activar </button>';
                            // area += '           <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" onclick="area.eliminarArea(' + obj.id + ')" ><span class="fa-fw select-all fas"></span> Desactivar </button>';
                            area += '           <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><span class="d-none d-sm-block">Close</span></button>';
                        }
                        area += '       </div>';
                        area += '    </div>';
                        area += '</div>';
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
            if ($("#codigo").val() != "" && $("#nombre").val() != "") {
                if ($("#foto").val() == "") {
                    var foto = "http://localhost:8080/Grissy/src/view/assets/images/fondo-tecnologico-preferido-selectores.jpg"
                }
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
                       
                        console.log(response);
                        $("#lst-area").empty();
                        area.obtenerListaArea(); 
                        area.limpiar(); 
                   


                            
                   
                        

                    }
                    
                });

            } else {
                Toastify({
                    text: "Se requiere un codigo y un nombre para poder registrar",
                    duration: 3000,
                    close: true,
                    backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                }).showToast();
            }
        },
        eliminarArea: function (id) {
            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/Area/eliminarArea.php',
                method: "POST",
                data: {
                    id: id,
                    estado: 0
                },
                complete: function (response) {
                    console.log(response);
                    $("#lst-area").empty();
                    area.obtenerListaArea();
                }
            });
        },
        obtenerPorId: function (id) {
            document.getElementById("codigo").disabled = true;
            var btn_2 = document.getElementById('editar');
            var btn_1 = document.getElementById('guardar');
            btn_2.style.display = 'inline';
            btn_1.style.display = 'none';

            $.ajax({
                url: "http://localhost:8080/Grissy/controllers/Area/buscarAreaPorId.php",
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
                        $("#foto").val(obj.foto);
                        $("#descripcion").val(obj.descripcion);

                    });
                }
            })
        },
        editarArea: function () {
            var codigo = $("#codigo").val();
            var nombre = $("#nombre").val();
            var foto = $("#foto").val();
            var descripcion = $("#descripcion").val();
            if ($("#nombre").val() != "") {
            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/Area/editarArea.php',
                method: "POST",
                data: {
                    codigo: codigo,
                    nombre: nombre,
                    descripcion: descripcion,
                    foto: foto
                },
                complete: function (response) {
                    console.log(response);
                    $("#lst-area").empty();
                    area.obtenerListaArea();
                    area.limpiar();
                }
            });} else {
                Toastify({
                    text: "El nombre no puede estar en blanco",
                    duration: 3000,
                    close: true,
                    backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                }).showToast();
            }
        },
        reintegrarArea: function (id) {
            $.ajax({
                url: 'http://localhost:8080/Grissy/controllers/Area/eliminarArea.php',
                method: "POST",
                data: {
                    id: id,
                    estado: 1
                },
                complete: function (response) {
                    console.log(response);
                    $("#lst-area").empty();
                    area.obtenerListaArea();
                }
            });
        },
        limpiar: function () {
            $("#codigo").val("");
            $("#nombre").val("");
            $("#foto").val("");
            $("#descripcion").val("");
        },
        en_guardar: function () {
            document.getElementById("codigo").disabled = false;
            var btn_2 = document.getElementById('editar');
            var btn_1 = document.getElementById('guardar');
            btn_2.style.display = 'none';
            btn_1.style.display = 'inline';
        }

    }
}();