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
                        area += '<div class="modal fade text-left" id="cartillaArea-' + obj.id + '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">';
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
                        area += '           <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal" onclick="area.editarArea(' + obj.id + ')"><span class="fa-fw select-all fas"></span> Editar </button>';
                        area += '           <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal" onclick="area.reintegrarArea(' + obj.id + ')" ><span class="fa-fw select-all fas"></span> Activar </button>';
                        area += '           <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" onclick="area.eliminarArea(' + obj.id + ')" ><span class="fa-fw select-all fas"></span> Desactivar </button>';
                        area += '           <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><span class="d-none d-sm-block">Close</span></button>';
                        area += '       </div>';
                        area += '    </div>';
                        area += '</div>';
                        area += '</div>';

                        //   if (obj.estado == 1) { disabled="true">

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