let usuario = document.getElementById("user");
let contrasenia = document.getElementById("password");
let boton = document.getElementById("botonLogin");
let okUsuario = false; 
let okContra = false;

function soloAlfanumerico (str) {
        if (typeof(str) !== "string") {
            return false;
        } else {
            return str.replace(/[A-Z]|[a-z]|[0-9]/g, "") === "";
        }
}

usuario.addEventListener("change", function(e) {
    e.preventDefault();
    const error = document.getElementById("errorUsuario");
    error.innerHTML = ""

    if (soloAlfanumerico(usuario.value) && usuario.value.length >= 6) {
        okUsuario = true;
        if (okUsuario && okContra) {
            boton.removeAttribute("disabled");
        }
    } else {
        okUsuario = false;
        boton.setAttribute("disabled", "");
        if (!soloAlfanumerico(usuario.value)) {
            const msj1 = document.createElement("p");
            msj1.className = "m-2 link-danger"
            msj1.innerText = "* El usuario solo puede contener carácteres alfanuméricos."
            error.appendChild(msj1)
        }
        if (usuario.value.length < 6) {
            const msj2 = document.createElement("p");
            msj2.className = "m-2 link-danger"
            msj2.innerText = "* El usuario debe contener al menos 6 carácteres."
            error.appendChild(msj2)
        }
    }

});


contrasenia.addEventListener("change", function(e){
    e.preventDefault();
    const error = document.getElementById("errorContra");
    error.innerHTML = ""

    if (contrasenia.value.length >= 6) {
        okContra = true;
        if (okUsuario && okContra) {
            boton.removeAttribute("disabled");
        }
    } else {
        okContra = false;
        boton.setAttribute("disabled", "");
        const msjerror = document.createElement("p");
        msjerror.className = "m-2 link-danger"
        msjerror.innerText = "* La contraseña debe contener al menos 6 carácteres."
        error.appendChild(msjerror)
    }
})