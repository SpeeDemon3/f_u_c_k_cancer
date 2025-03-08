// Validacion desde el front para el formulario que permite agregar una asociacion

// Obtengo el formulario
const form = document.forms["form-association"];

// Inputs
const nameInput = document.getElementById("name");
const emailInput = document.getElementById("email");
const passInput = document.getElementById("pass");
const descriptionInput = document.getElementById("descripcion");
const imageInput = document.getElementById("image");
const phoneInput = document.getElementById("phone");
const webInput = document.getElementById("web");

// Span para mostrar errores
const spanErrorName = document.getElementById("error-name");
const spanErrorEmail = document.getElementById("error-email");
const spanErrorPass = document.getElementById("error-pass");
const spanErrorDescription = document.getElementById("error-descripcion");
const spanErrorImage = document.getElementById("error-image");
const spanErrorPhone = document.getElementById("error-phone");
const spanErrorWebSite = document.getElementById("error-web");

form.addEventListener('submit', function(event) {
    event.preventDefault();

    let isValid = true;

    // Compruebo si los campos del formulario son correctos
    if (validateName() === false) {
        isValid = false;
    }

    if (validateEmail() === false) {
        isValid = false;
    }
    
    
    if (validatePassword() === false) {
        isValid = false;
    }
    

    if (validateDescription() === false) {
        isValid = false;
    }
    
    /*
    if (validateImage() === false) {
        isValid = false;
    }
    */
   
    if (validatePhone() === false) {
        isValid = false;
    }

    if (validateURL() === false) {
        isValid = false;
    }

    // Si todo es correcto se envia el formulario
    if(isValid === true) {
        form.submit();
    }

})

/**
 * Metodo para validar el nombre de la asociacion
 * @returns True si es correcto, false en caso contrario
 */
function validateName() {
    let inputValue = nameInput.value;
    spanErrorName.innerHTML = "";
    
    if (inputValue.length <= 2) {
        spanErrorName.style.color = '#EB0046';
        spanErrorName.innerText = "El nombre introducido no es válido, tiene que tener una longitud mayor a 2 caracteres.";
        return false;
    }

    return true;

}

/**
 * Metodo para validar el email de una asociacion
 * @returns True si es correcto, false en caso contrario
 */
function validateEmail() {

    spanErrorEmail.innerHTML = '';

    // Obtengo el valor del email
    let emailUser = emailInput.value;

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

/**
 * Metodo para validar la contraseña de una asociacion
 * @returns True si es correcta, false en caso contrario
 */
function validatePassword() {
    spanErrorPass.innerHTML = '';

    // Obtengo el valor del pass
    let passUser = passInput.value;

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

/**
 * Metodo para validar la descripcion de una asociacion
 * @returns True si es correcto, false en caso contrario
 */
function validateDescription() {
    let inputValue = descriptionInput.value;
    spanErrorDescription.textContent = "";
    if (inputValue.length < 11) {
        spanErrorDescription.style.color = '#EB0046';
        spanErrorDescription.innerHTML = "La descripción introducida no es válida, tiene que tener una longitud mayor a 10 caracteres.";
        return false;
    }

    return true;

}

/**
 * Metodo para validar la imagen de una asociacion
 * @returns True si es correcto, false en caso contrario
 */
/*
function validateImage() {
    const file = imageInput.files[0];
    spanErrorImage.textContent = "";

    if (!file) {
        spanErrorImage.style.color = '#EB0046';
        spanErrorImage.innerHTML = "Debes seleccionar una imagen.";
        return false;
    }

    return true;

}
*/

/**
 * Metodo para validar el telefono de una asociacion
 * @returns True si es correcto, false en caso contrario
 */
function validatePhone() {

    const userPhone = phoneInput.value;
    spanErrorPhone.innerHTML = "";

    // Expresión regular para validar el teléfono
    const regex = /^\+?(\d[\s-]?){9,15}$/;

    if(regex.test(userPhone) == true) {
        return true;
    } else {
        spanErrorPhone.style.color = 'red';
        spanErrorPhone.innerHTML = 'El teléfono no es válido. Debe tener al menos 9 números.';
        return false;
    }

    
}

/**
 * Metodo para validar el sitio web de una asociacion
 * @returns True si es correcta, false en caso contrario
 */
function validateURL() {

    const userWeb = webInput.value;
    spanErrorWebSite.innerHTML = "";

    // Expresión regular para validar la URL
    const regex = /^(https?:\/\/)?([\w-]+\.)+[\w-]+(\/[\w- .\/?%&=]*)?$/;

    if (regex.test(userWeb) == true) {
        return true;
    } else {
        spanErrorWebSite.style.color = 'red';
        spanErrorWebSite.innerHTML = 'La dirección web introducida no es válida. Pro favor compruebe el formato.';
        return false;
    }
}