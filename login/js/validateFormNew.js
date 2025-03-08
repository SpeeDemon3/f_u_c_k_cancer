// Validacion desde el front para el formulario que permite agregar una noticia

// Obtengo el formulario
const form = document.forms["add-new-form"];

// Inputs
const titleInput = document.getElementById("titulo");
const descriptionInput = document.getElementById("descripcion");
const imageInput = document.getElementById("imagen");

// Span para mostrar errores
const spanErrorTitle = document.getElementById("error-title");
const spanErrorDescription = document.getElementById("error-description");
const spanErrorImage = document.getElementById("error-image");

form.addEventListener('submit', function(event) {
    event.preventDefault();

    let isValid = true;

    // Compruebo si los campos del formulario son correctos
    if (validateTitle() === false) {
        isValid = false;
    }

    if (validateDescription() === false) {
        isValid = false;
    }
    
    if (validateImage() === false) {
        isValid = false;
    }

    // Si todo es correcto se envia el formulario
    if(isValid === true) {
        form.submit();
    }

})

/**
 * Metodo para validar el titulo de la noticia
 * @returns True si es correcto, false en caso contrario
 */
function validateTitle() {
    let inputValue = titleInput.value;
    spanErrorTitle.innerHTML = "";
    
    if (inputValue.length <= 5) {
        spanErrorTitle.style.color = '#EB0046';
        spanErrorTitle.innerText = "El titulo introducido no es válido, tiene que tener una longitud mayor a 4 caracteres.";
        return false;
    }

    return true;

}

/**
 * Metodo para validar la descripcion de la noticia
 * @returns True si es correcto, false en caso contrario
 */
function validateDescription() {
    let inputValue = descriptionInput.value;
    spanErrorDescription.textContent = "";
    if (inputValue.length < 11) {
        spanErrorDescription.style.color = '#EB0046';
        spanErrorDescription.textContent = "La descripción introducida no es válida, tiene que tener una longitud mayor a 10 caracteres.";
        return false;
    }

    return true;

}

/**
 * Metodo para validar la imagen de la noticia
 * @returns True si es correcto, false en caso contrario
 */
function validateImage() {
    const file = imageInput.files[0];
    spanErrorImage.textContent = "";

    if (!file) {
        spanErrorImage.style.color = '#EB0046';
        spanErrorImage.textContent = "Debes seleccionar una imagen.";
        return false;
    }

    return true;

}