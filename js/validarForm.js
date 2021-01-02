let btnModificar = document.getElementById('modificar');
let inputs = document.querySelectorAll('input');

btnModificar.addEventListener('click', () => {
    inputs.forEach(input => input.value = '');
});