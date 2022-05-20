
var nav = function () {

    return {
        cerrarSeccion: function () {
            window.localStorage.removeItem("empleado");
        },
    }
}();