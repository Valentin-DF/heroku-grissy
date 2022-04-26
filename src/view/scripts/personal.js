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
                       
                        personal += '<div class="col-xl-4 col-md-6 col-sm-12">';
                        personal += '    <div class="card " >';
                        personal += '        <div class="card-header">';
                        personal += '            <img class="img-fluid w-100" src="'+obj.foto+'"';
                        personal += '                alt="Card image cap">';
                        personal += '        </div>';
                        personal += '        <div class="card-body">';
                        personal += '            <h4 class="card-title">'+obj.nombre+' '+obj.apellidoPaterno+' '+obj.apellidoMaterno+'</h4>';
                        personal += '        </div>';
                        personal += '        <div class="card-footer d-flex justify-content-between"';
                        personal += '            <span>'+obj.cargo+'</span>';
                        personal += '            <button class="btn btn-light-primary" >Read More</button>';
                        personal += '        </div>';
                        personal += '    </div>';
                        personal += '</div>';

                        $("#lst-personal").append(personal);
                    });
                }
            })

        }
        
    }
}();
