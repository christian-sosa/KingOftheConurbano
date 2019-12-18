var form = document.getElementById('formulario');

console.log('hola');
form.onsubmit = function(event)
{
  for(var element of form.elements)
  {
    if(element.name != "_token" && element.name != "button")
    {
      if(element.name != "categoria" && element.value == "")
      {
        error(element, "No puede dejar este campo vacío");
        event.preventDefault();
      }
    }

    if(element.value != "")
    {
      if(element.name == "imagen")
      {
        if(!validateImage(element.value))
        {
          error(element, "La imágen subida no tiene extensión válida (PNG, JPG, JPEG)");
          event.preventDefault();
        } else {
          quitarError(element);
        }
      }
      if(element.name == "precio")
      {
        if(!validatePrecio(element.value))
        {
          error(element, "El valor tiene que ser un numero");
          event.preventDefault();
        }
        else
        {
          quitarError(element);
        }
      }
      if(element.value != "")
      {
        if(element.name == "nombre")
        {
          if(!validateName(element.value))
          {
            error(element, "El nombre ingresado es inválido");
            event.preventDefault();
          }
          else
          {
            quitarError(element);
          }
        }
      }
    }
  }

  function validateName(name)
  {
    var expRegNombre = /^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/;
    return expRegNombre.test(name);
  }

  function validatePrecio(phone)
  {
    return !isNaN(phone);
  }

  function validateImage(image)
  {
    extension = image.split('.').pop();

    return extension == "jpg" || extension == "jpeg" || extension == "png";
  }

  function error(element, error)
  {
    if(error != "")
    {
      var div = element.parentNode;

      var errorSpan = div.querySelector('span.invalid-feedback');

      if(!errorSpan)
      {
        element.classList.add("is-invalid");

        var span = document.createElement('span');
        span.setAttribute('class', 'invalid-feedback');
        span.setAttribute('role', 'alert');
        span.style.textAlign = "center";
        span.innerHTML = "<strong>" + error + "</strong>";

        div.append(span);
      }
      else
      {
        errorSpan.innerHTML = "<strong>" + error + "</strong>";;
      }
    }
  }

  function quitarError(element)
  {
    var div = element.parentNode;

    var input = div.querySelector('input');
    input.classList.remove("is-invalid");

    var span = div.querySelector('span');

    if(span)
    {
      div.removeChild(span);
    }
  }
}
