var form = document.querySelector('form');

form.onsubmit = function(event) {
  for(var element of form.elements) {
    if(element.name != "_token" && element.name != "button" && element.name != "remember") {
      if(element.name != "telefono" && element.name != "avatar" && element.value == "") {
        error(element, "No puede dejar este campo vacío");
  event.preventDefault();
      }

      if(element.value != "") {
        var password = "";

        if(element.name == "name" && !validateName(element.value)) {
          error(element, "El nombre ingresado es inválido");
            event.preventDefault();
        } else {
          quitarError(element);
        }

        if(element.name == "email" && !validateEmail(element.value)) {
          error(element, "El email ingresado es inválido");
            event.preventDefault();
        } else {
          quitarError(element);
        }

        if(element.name == "password" && !validatePassword(element.value)) {
          password = elements.value;
          error(element, "La contraseña es demasiada corta (min 8 carácteres)");
            event.preventDefault();
        } else {
          quitarError(element);
        }

        if(element.name == "password_confirmation" && !passwordConfirms(password, element.value)) {
          error(element, "Las contraseñas no coinciden");
          error(document.querySelector('input#password'), "Las contraseñas no coinciden");
            event.preventDefault();
        } else {
          quitarError(element);
          quitarError(document.querySelector('input#password'));
        }

        if(element.name == "fecha_nac" && element.value != "" && !validateDate(element.value)) {
          error(element, "La fecha de nacimiento que ingresaste no es válida");
            event.preventDefault();
        } else {
          quitarError(element);
        }

        if(element.name == "telefono" && element.value != "" && !validatePhone(element.value)) {
          error(element, "El número de teléfono ingresado no es válido");
            event.preventDefault();
        } else {
          quitarError(element);
        }

        if(element.name == "avatar" && element.value != "" && !validateImage(element.value)) {
          error(element, "La imágen subida no tiene extensión válida (PNG, JPG, JPEG)");
            event.preventDefault();
        } else {
          quitarError(element);
        }
      }
    }
  }
}

function validateName(name) {
  var expRegNombre = /^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/;
  return expRegNombre.test(name);
}

function validateEmail(email) {
  var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
}

function validatePassword(password) {
  return password.length >= 8;
}

function passwordConfirms(password, confirmation) {
  return password == confirmation;
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
            ( userBirthDay.year <= actualDate.getFullYear() ) );
}

function validatePhone(phone) {
  return !isNaN(phone);
}

function validateImage(image) {
  extension = image.split('.').pop();

  return extension == "jpg" || extension == "jpeg" || extension == "png";
}

function error(element, error) {
  if(error != ""){
    var div = element.parentNode;

    var errorSpan = div.querySelector('span.invalid-feedback');

    if(!errorSpan) {
      element.classList.add("is-invalid");

      var span = document.createElement('span');
      span.setAttribute('class', 'invalid-feedback');
      span.setAttribute('role', 'alert');
      span.style.textAlign = "center";
      span.innerHTML = "<strong>" + error + "</strong>";

      div.append(span);
    } else {
      errorSpan.innerHTML = "<strong>" + error + "</strong>";;
    }
  }
}

function quitarError(element) {
 var div = element.parentNode;

 var input = div.querySelector('input');
 input.classList.remove("is-invalid");

 var span = div.querySelector('span');

 if(span) {
   div.removeChild(span);
 }
}
