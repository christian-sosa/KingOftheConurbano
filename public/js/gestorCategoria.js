var disabledForms = document.querySelectorAll('form.disabled');

for(var form of disabledForms) {
  form.onsubmit = function(event) {
    event.preventDefault();

    var span = document.createElement('span');
    span.style.fontSize = '80%';
    span.style.color = '#dc3545';
    span.innerHTML += '<strong>No puede eliminar esta categoría porque tiene productos asignados.<br>Para poder eliminar esta categoría, asígnele una categoría diferente a los productos que actualmente tienen asginada la categoría que desea eliminar.<br></strong>'
      + '<a href="/gestorproductos">Ir al gestor de productos.</a>';

    if(!this.querySelector('span'))
      this.append(span);
  }
}
