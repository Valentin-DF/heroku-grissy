window.onload = function () {
    // var contenido = document.getElementById('contenido');
    var contenedor = document.getElementById('contenedor_carga');

    const storedToDos = localStorage.getItem("empleado");
    if (storedToDos != undefined) {

        const storedToDos = localStorage.getItem("empleado");
        const obj = JSON.parse(storedToDos);

        permisos.configurarAcceso(obj.codigo);
        // $("#usuario").val(obj.nombre);
        document.getElementById("usuario1U").innerHTML = obj.nombre + " " + obj.apellidoPaterno + " " + obj.apellidoMaterno;
        document.getElementById("usuario2U").innerHTML = obj.nombre + " " + obj.apellidoPaterno + " " + obj.apellidoMaterno;
        document.getElementById("correosU").innerHTML = obj.correo;
        document.getElementById('foto1U').setAttribute("src", obj.foto);
        document.getElementById('foto2U').setAttribute("src", obj.foto);
        contenedor.style.visibility = 'hidden';
        contenedor.style.opacity = 0;
    } else {

        window.location.replace('http://localhost:8080/Grissy/src/view/dist/e_401.html');

    }

}