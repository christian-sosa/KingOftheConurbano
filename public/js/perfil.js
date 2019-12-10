var elementos = document.querySelectorAll('li.list-group-item');

activarOnClicks();

function modificarCampo() {
  desactivarOnClicks();

  this.classList.add('modificando');

  var campo = getCampo(this);

  var label = document.createElement('label');
  label.setAttribute('for', campo);
  label.innerHTML = getTexto(campo)

  var input = document.createElement('input');
  input.setAttribute('type', 'text');
  input.setAttribute('id', campo);
  input.setAttribute('name', campo);
  input.setAttribute('value', this.querySelector('span.card-text').innerHTML);
  input.onchange = function() { hayModificaciones(); };

  var boton = document.createElement('button');
  boton.setAttribute('type', 'submit');
  boton.innerHTML = 'Confirmar';
  boton.onclick = confirmarCambios;

  this.innerHTML = '';
  this.append(label);
  this.append(input);
  this.append(boton);
}

function confirmarCambios() {
  var elemento = document.querySelector('li.list-group-item.modificando');

  var contenido = document.createElement('span');
  contenido.setAttribute('class', 'card-text');
  contenido.innerHTML = elemento.querySelector('input').value;

  var editar = document.createElement('span');
  editar.innerHTML = 'Editar';

  elemento.innerHTML = '';
  elemento.append(contenido);
  elemento.append(editar);
  elemento.classList.remove('modificando');
  elemento.onclick = function() { activarOnClicks(); };
}

function hayModificaciones() {
  var card = document.querySelector('div.card');

  var form = card.querySelector('form');

  if(form.querySelector('button') == null) {
    var button = document.createElement('button');
    button.setAttribute('type', 'submit');
    button.innerHTML = 'Revisar y guardar cambios';
    button.onclick = function () {
        for(var elemento of elementos) {
          var input = document.createElement('input');
          input.setAttribute('type', 'hidden');
          input.setAttribute('name', getCampo(elemento));
          input.value = elemento.querySelector('span.card-text').innerHTML;
          console.log(input);
          form.append(input);
        }
    }

    form.append(button);
  }
}

function activarOnClicks() {
  for(var elemento of elementos) {
    elemento.onclick = modificarCampo;
  }
}

function desactivarOnClicks() {
  for(var elemento of elementos) {
    elemento.onclick = '';
  }
}

function getCampo(elemento) {
  var campos = ['name', 'email', 'fecha_nac', 'telefono'];
  var campo;
  var indice = 0;
  var encontrado = false;

  while(!encontrado && indice < campos.length) {
    if(elemento.classList.contains(campos[indice])) {
      campo = campos[indice];
      encontrado = true;
    }
    indice++;
  }

  return campo;
}

function getTexto(texto) {
  if(texto == 'name')
    return 'Nombre';
  else if(texto == 'email')
    return 'Email';
  else if(texto == 'fecha_nac')
    return 'Fecha de nacimiento';
  else if(texto == 'telefono')
    return 'Numero de telefono'
}
