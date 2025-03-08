// Obtengo el formulario
const form = document.forms['form-login'];

// Evento para el envio del formulario
form.addEventListener('submit', function(event) {
    // Evito el comportamiento por defecto
    event.preventDefault();    

    // Valido el formulario
    let isEmailValid = validateEmail();
    let isPasswordValid = validatePassword();

    // Si ambas validaciones son correctas, enviar el formulario
    if (isEmailValid && isPasswordValid) {
        console.log("Formulario enviado correctamente.");
        console.log(form); // Verifica que `form` no sea null o undefined
        // Envio el formulario 
        form.submit();
    } else {
        console.log("Error: No se enviará el formulario.");
    }
})

function validateEmail() {
    // Obtengo los elementos del HTML
    let inputEmail = document.getElementById('email');
    let spanErrorEmail = document.getElementById('error-email');
    spanErrorEmail.innerHTML = '';


    // Obtengo el valor del email
    let emailUser = inputEmail.value;

    // Expresion regular para validar el email
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if(emailUser.length > 5 && regex.test(emailUser)) {
        return true;
    } else {
        spanErrorEmail.style.color = 'red';
        spanErrorEmail.innerHTML = 'El email introducido no es válido.';
        spanErrorEmail.innerHTML += 'Debe tener un formato válido (ejemplo: usuario@dominio.com).';
        return false;
    }

}


function validatePassword() {
    // Obtengo los elementos del HTML
    let inputPass = document.getElementById('password');
    let spanErrorPass = document.getElementById('error-pass');
    spanErrorPass.innerHTML = '';

    // Obtengo el valor del pass
    let passUser = inputPass.value;

    /**
     * Expresion regular para validar el password
     * Mínimo 8 caracteres.
     * Al menos una letra mayúscula.
     * Al menos una letra minúscula.
     * Al menos un número.
     * Al menos un carácter especial (por ejemplo, !@#$%^&*).
     * 
     */
    const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    // Compruebo si el password comple con la expresion regular
    if(regex.test(passUser)) {
        return true;
    } else {
        spanErrorPass.style.color = 'red';
        spanErrorPass.innerHTML = 'El password no es válido. Debe tener al menos 8 caracteres, una mayúscula, una minúscula, un número y un carácter especial.';
        return false;
    }

}