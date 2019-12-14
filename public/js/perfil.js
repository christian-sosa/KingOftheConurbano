const formCard = document.getElementById('form-card');
const form = formCard.querySelector('form');
const profileCard = document.getElementById('profile-card');
const slideButton = document.querySelector('button#slide');
const sendFormButton = document.querySelector('button#send-button');
const formImg = document.getElementById('form-img');
const formImgInput = document.getElementById('avatar');

if(formCard.style.display == 'block') {
  setFormDimensions();
}

var errors = {};

slideButton.onclick = showForm;
formImgInput.onchange = function() {
  readURL(this);
}
sendFormButton.onclick = function () {
  this.setAttribute('type', 'button');
  var modificacionesHechas = false;
  var indice = 0;

  while(!modificacionesHechas && indice < form.elements.length) {
    if(form.elements[indice].name != "_token" && form.elements[indice].name != "button") {
      if(form.elements[indice].value != "") {
        modificacionesHechas = true;
      }
    }
    indice ++;
  }

  if(modificacionesHechas) {
    this.setAttribute('type', 'submit');
  }
}
form.onsubmit = function(event) {
  for(var element of form.elements) {
    if(element.name != "button" && element.name != "_token"){
      // PARA EL NOMBRE
      if(element.name == "name") {
        if(element.value != "" && !validateName(element.value)) {
          errors.name = "El nombre debe ser texto";
          event.preventDefault();
        } else {
          errors.name = "";
        }
      }
      // PARA EL EMAIL
      else if(element.name == "email") {
        if(element.value != "" && !validateEmail(element.value)) {
          errors.email = "El email ingresado no es válido";
          event.preventDefault();
        } else {
          errors.email = "";
        }
      }
      // PARA LA FECHA DE NACIMIENTO
      else if(element.name == 'fecha_nac') {
        if(element.value != "" && !validateDate(element.value)) {
          errors.date = "La fecha de nacimiento que ingresaste no es válida";
          event.preventDefault();
        } else {
          errors.date = "";
        }
      }
      // PARA EL TELEFONO
      else if(element.name == "telefono") {
        if(element.value != "" &&  !validatePhone(element.value)) {
          errors.phone = "El numero de teléfono que ingresaste no es válido";
          event.preventDefault();
        } else {
          errors.phone = "";
        }
      }
    }
  }
  // SI HAY ERRORES LOS IMPRIMO
  showErrors();
}

function validateEmail(email) {
  var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
}

function validateName(name) {
  var expRegNombre = /^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/;
  return expRegNombre.test(name);
}

function validateDate(date) {
  var year = '';
  var month = '';
  var day = '';

  for(var i = 0; i < 10; i++) {
    if(i < 4)
      year += date[i].toString();
    else if(i > 4 && i < 7)
      month += date[i].toString();
    else if(i > 7 && i < 10)
      day += date[i].toString();
  }

  var userBirthDay = {
    year : parseInt(year),
    month : parseInt(month),
    day : parseInt(day)
  }

  return (plus18(userBirthDay) && validDate(userBirthDay));
}

function plus18(userBirthDay) {
  var actualDate = new Date();

  return  ( ( ( userBirthDay.year + 18 ) <= actualDate.getFullYear() ) );
}

function validDate(userBirthDay) {
  var actualDate = new Date();

  return  ( ( userBirthDay.year > ( actualDate.getFullYear() - 100 ) ) &&
            ( actualDate.getFullYear() < userBirthDay.year ) );
}

function validatePhone(phone) {
  return !isNaN(phone);
}

function showForm() {
  formCard.style.display = 'block';
  setFormDimensions();
  slideButton.innerHTML = 'Cerrar ventana de modificaciones';
  slideButton.onclick = function() { hideForm() }
}

function hideForm() {
  formCard.style.display = 'none';
  slideButton.innerHTML = 'Modificar datos del perfil';
  slideButton.onclick = function() { showForm() }
}

function setFormDimensions() {
  setEqualDimensions(document.getElementById('profile-img'), formImg, false);
  setEqualDimensions(document.getElementById('profile-imgContainer'), document.getElementById('form-imgContainer'), true);
  setEqualDimensions(document.getElementById('profile-name'), document.getElementById('form-name'), true);
  setEqualDimensions(document.getElementById('profile-email'), document.getElementById('form-email'), true);
  setEqualDimensions(document.getElementById('profile-date'), document.getElementById('form-date'), true);
  setEqualDimensions(document.getElementById('profile-phone'), document.getElementById('form-phone'), true);
  setEqualDimensions(document.getElementById('profile-button'), document.getElementById('form-button'), true);
}

function setEqualDimensions(profileElement, formElement, formTakesProfileDimensions) {
  if(formTakesProfileDimensions) {
    profileElement.style.height = formElement.offsetHeight + 'px';
  } else {
    formElement.style.height = profileElement.offsetHeight + 'px';
  }
}

function showErrors() {
  showError(errors.name, 'form-name');
  showError(errors.email, 'form-email');
  showError(errors.date, 'form-date');
  showError(errors.phone, 'form-phone');
}

function showError(error, id) {
  if(error == '') {
    var field = getField(id);

    var input = field.querySelector('input');
      input.classList.remove('is-invalid');

    var errorSpan = field.querySelector('span.invalid-feedback');

    if(errorSpan != null) {
      errorSpan.parentNode.removeChild(errorSpan);
    }
  } else {
    var field = getField(id);

    var input = field.querySelector('input');
    input.classList.add('is-invalid');

    var errorSpan = document.createElement('span');
    errorSpan.setAttribute('class', 'invalid-feedback')
    errorSpan.setAttribute('role', 'alert')
    errorSpan.innerHTML = '<strong>' + error + '</strong>';

    if(field.querySelector('div').querySelector('span.invalid-feedback') == null)
      field.querySelector('div').append(errorSpan);

    setFormDimensions();
  }
}

function getField(id) {
  return document.getElementById(id)
}

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      formImg.setAttribute('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}
