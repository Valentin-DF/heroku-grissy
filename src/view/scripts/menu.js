var menu = function () {

    return {
         cerrarSeccion: function() {
            window.localStorage.removeItem("empleado");
        }
    }
}();
