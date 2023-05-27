// Función para mostrar el sprite de un Pokémon
function mostrarSprite(nombre, sprite) {
    var elemento = document.getElementById("sprite");
    elemento.innerHTML = "<img src='https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/" + sprite + ".png' alt='" + nombre + "' />";
}

// Función para mostrar y ocultar el filtro de tipo
function toggleFiltroTipo() {
    var elemento = document.getElementById("filtro-tipo");
    if (elemento.style.display === "none") {
        elemento.style.display = "block";
    } else {
        elemento.style.display = "none";
    }
}

// Función para filtrar resultados por tipo
function filtrarPorTipo() {
    var tipo = document.getElementById("select-tipo").value;
    window.location.href = "listado.php?tipo=" + tipo;
}

// Función para ordenar resultados por nombre
function ordenarPorNombre() {
    window.location.href = "listado.php?orden=nombre";
}

// Función para ordenar resultados por número
function ordenarPorNumero() {
    window.location.href = "listado.php?orden=numero";
}

// Función para borrar un Pokémon
function borrarPokemon(id) {
    if (confirm("¿Estás seguro de que quieres borrar este Pokémon?")) {
        window.location.href = "borrar.php?id=" + id;
    }
}

// Función para validar el formulario de inserción
function validarFormulario() {
    var nombre = document.getElementById("nombre").value.trim();
    var tipo = document.getElementById("tipo").value.trim();
    var numero = document.getElementById("numero").value.trim();
    var errores = [];

    if (nombre === "") {
        errores.push("Debes introducir un nombre para el Pokémon");
    }

    if (tipo === "") {
        errores.push("Debes seleccionar un tipo para el Pokémon");
    }

    if (numero === "") {
        errores.push("Debes introducir un número para el Pokémon");
    } else if (isNaN(numero)) {
        errores.push("El número del Pokémon debe ser un valor numérico");
    } else if (numero <= 0) {
        errores.push("El número del Pokémon debe ser mayor que cero");
    }

    if (errores.length > 0) {
        var mensaje = "";
        for (var i = 0; i < errores.length; i++) {
            mensaje += errores[i] + "\n";
        }
        alert(mensaje);
        return false;
    } else {
        return true;
    }
}
