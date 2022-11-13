let botonCerrar = document.getElementById("botonCerrar");
let contenedorForm = document.getElementById("form");
let contenedorCerrar = document.getElementById("contenedorCerrar");

botonCerrar.addEventListener("click", () => {
    contenedorForm.className = "";
    contenedorCerrar.className = "visually-hidden";
})