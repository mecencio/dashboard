// Agarro el selector del plato / comida
let item = document.getElementById("item-menu");

// Tomo todo el div que va a contener la imagen.
let contenedor = document.getElementById("imagen-item");

// Pongo un escuchador para cuando cambie la selección del item del menu.
item.addEventListener("change", () =>{
    // Reemplazo el contenido del contenedor por una etiqueta img que por get pasa el ID del item seleccionado
    contenedor.innerHTML =
            `
                <img src="core/mostrarImagen.php?id=${item.value}" class="p-4">
            `;
})