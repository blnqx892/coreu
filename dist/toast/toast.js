// Función interna para mostrar cualquier tipo de toast
function toastBoostrap(type, cadena) { 
    // Verifica si la cadena no es indefinida ni nula, luego actualiza el contenido del toast y lo muestra
    try {
        $('#toast-' + type).toast('show');
        $('#text-' + type).html(cadena);
    } catch (error) {
        dangerToast(error)
    }finally{
        type = cadena = null;
    }
}

// Función para mostrar un toast de éxito con un mensaje específico
function successToast(cadena) { 
    toastBoostrap('success', cadena);
}

// Función para mostrar un toast de advertencia (warning)
function warningToast(cadena) { 
    toastBoostrap('warning', cadena);
}

// Función para mostrar un toast de peligro (danger)
function dangerToast(cadena) { 
    toastBoostrap('danger', cadena);
}

// Función para mostrar un toast de peligro (danger)
function infoToast(cadena) { 
    toastBoostrap('info', cadena);
}