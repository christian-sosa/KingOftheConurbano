function modificar(campo) {
  var li = document.querySelector('li.' + campo)
  li.onclick = ''

  var valor = li.querySelector('span.card-text').innerHTML

  if(valor == '')
    valor = 'Sin asignar'

  var p = document.createElement('p')

  var labelValorAntiguo = document.createElement('label')
  labelValorAntiguo.setAttribute('for', campo)
  labelValorAntiguo.innerHTML = 'Actual: ' + valor

  var labelCampo = document.createElement('label')
  labelCampo.setAttribute('for', campo)
  labelCampo.innerHTML = 'Nuevo'

  var input = document.createElement('input')
  input.setAttribute('name', campo)
  input.setAttribute('id', campo)

  if(campo == 'fecha_nac') {
    p.innerHTML = 'Fecha de nacimiento'
    input.setAttribute('type', 'date')
  } else if(campo == 'telefono') {
    p.innerHTML = 'Telefono'
    input.setAttribute('type', 'tel')
  } else {
    if(campo == 'name')
      p.innerHTML = 'Nombre'
    else
      p.innerHTML = 'Email'

    input.setAttribute('type', 'text')
  }

  var button = document.createElement('button')
  button.setAttribute('type', 'button')
  button.innerHTML = 'Confirmar'
  button.onclick = function() { aplicar(li, input) }

  li.innerHTML = ''
  li.append(p)
  li.append(labelValorAntiguo)
  li.append(labelCampo)
  li.append(input)
  li.append(button)
}

function aplicar(li, input) {
  var valor = input.value

  var texto = document.createElement('span')
  texto.setAttribute('class', 'card-text')
  texto.innerHTML = valor

  var editar = document.createElement('span')
  editar.innerHTML = 'Editar'

  li.innerHTML = ''
  li.append(texto)
  li.append(editar)
}
