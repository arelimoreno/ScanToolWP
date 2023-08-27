
document.addEventListener("DOMContentLoaded", function (event) {
  // Variables
  const miLista = document.getElementById('books-list-general');
  const btnGeneral = document.querySelectorAll('.btn-book-general')

  // Cambia el tipo de lista segun la instrucción del boton
  btnGeneral.forEach(btn => {
    btn.addEventListener('click', function () {
      type = this.getAttribute('data-id');
      miLista.classList.remove('books-card', 'books-box', 'books-list');
      miLista.classList.add(type);

      btnGeneral.forEach((item) => {
        item.classList.remove("btn-current"); // B orrar clase current a todos los botones 
      });
      this.classList.add('btn-current'); // agregar clase current al boton del click 

    })
  })

});