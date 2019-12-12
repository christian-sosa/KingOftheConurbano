const formCard = document.getElementById('form-card');
const form = formCard.querySelector('form');
const profileCard = document.getElementById('profile-card');
const slideButton = document.querySelector('button#slide');
const formImg = document.getElementById('form-img');
const formImgInput = document.getElementById('avatar');

var errors = {};

slideButton.onclick = showForm;
formImgInput.onchange = function() {
  readURL(this);
}
form.onsubmit = function(event) {
  for(var element of form.elements) {
    if(element.name != "button" && element.name != "_token"){
      if(element.name == "name") {
        if(element.value != "" && !validateName(element.value)) {
          errors.name = "El nombre debe ser texto";
          event.preventDefault();
        } else {
          errors.name = "";
        }
      } else if(element.name == "email") {
        if(element.value != "" && !validateEmail(element.value)) {
          errors.email = "El email ingresado no es válido";
          event.preventDefault();
        } else {
          errors.email = "";
        }
      } else if(element.name == 'fecha_nac') {
        if(element.value != "" && !validateDate(element.value)) {
          errors.date = "La fecha de nacimiento que ingresaste no es válida";
          event.preventDefault();
        } else {
          errors.date = "";
        }
      } else if(element.name == "telefono") {
        if(element.value != "" &&  !validatePhone(element.value)) {
          errors.phone = "El numero de teléfono que ingresaste no es válido";
          event.preventDefault();
        } else {
          errors.phone = "";
        }
      }
    }
  }
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
  var actualDate = new Date();

  for(var i = 0; i < 10; i++) {
    if(i < 4)
      year += date[i].toString();
    else if(i > 4 && i < 7)
      month += date[i].toString();
    else if(i > 7 && i < 10)
      day += date[i].toString();
  }

  if(actualDate.getFullYear() - 18 < parseInt(year) || parseInt(year) > actualDate.getFullYear())
    return false
  if(actualDate.getMonth() < parseInt(month) && actualDate.getFullYear() < parseInt(year))
    return false
  if(actualDate.getDay() < parseInt(day) && actualDate.getMonth() < parseInt(month) && actualDate.getFullYear() < parseInt(year))
    return false

  return true;
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

    var errorSpan = field.querySelector('span.error');

    if(errorSpan != null) {
      errorSpan.parentNode.removeChild(errorSpan);
    }
  } else {
    var field = getField(id);

    var errorSpan = document.createElement('span');
    errorSpan.setAttribute('class', 'error')
    errorSpan.style.color = 'red';
    errorSpan.innerHTML = '<strong>' + error + '</strong>';

    if(field.querySelector('li').querySelector('span.error') == null)
      field.querySelector('li').append(errorSpan);

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
