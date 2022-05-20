window.onload = function() {
    // var contenido = document.getElementById('contenido');
    var contenedor = document.getElementById('contenedor_carga');
    
    const storedToDos = localStorage.getItem("empleado");
    if (storedToDos != undefined) {
        contenedor.style.visibility = 'hidden';
        contenedor.style.opacity = 0;
    }else{; 

        window.location.replace('http://localhost:8080/Grissy/src/view/login.html');

    }

}