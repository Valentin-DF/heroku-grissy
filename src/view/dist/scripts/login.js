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

                    console.log(response)
                    var object = [];
                    var objListado = JSON.parse(response);
                    if (objListado != "") {
                        $(objListado).each(function (i, obj) {

                            if (obj.estado == 1) {
                                localStorage.setItem("empleado", JSON.stringify(obj));
                                window.location.replace('http://localhost:8080/Grissy/src/view/menu.php');
                                console.log(response);
                            } else {
                                Toastify({
                                    text: "Su cuenta se encuentra inactiva",
                                    duration: 3000,
                                    close: true,
                                    backgroundColor: "linear-gradient(to right, #ff5c74,#e30e2e )",
                                }).showToast();
                            }
                        });
                    } else {
                        Toastify({
                            text: "Usted no cuenta con cuenta",
                            duration: 3000,
                            close: true,
                            backgroundColor: "linear-gradient(to right,#ff5c74,#e30e2e )",
                        }).showToast();
                    }


                }
            })

        }

    }
}();
