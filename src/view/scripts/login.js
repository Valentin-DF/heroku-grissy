var login = function () {

    return {
        iniciarSeccion: function () {
            var correo = $("#correo").val();
            var contrasena = $("#contra").val();
            $.ajax({
                url: "http://localhost:8080/Grissy/controllers/Personal/iniciarSeccion.php",
                method: "POST",
                data: {
                    correo: correo,
                    contrasena: contrasena
                },
                success: function (response) {
                    console.log(response);
                    var objListado = JSON.parse(response);


                    localStorage.setItem("empleado", JSON.stringify(objListado));

                    window.location.replace('http://localhost:8080/Grissy/src/view/menu.html');






                }
            })

        }

    }
}();
