document.addEventListener('DOMContentLoaded', function() {
    mostrarBarra();
    modoOscuro();
})

function mostrarBarra() {
const barra = document.querySelector('.icono-menu');
const navegacion = document.querySelector('.navegacion');

barra.addEventListener('click', function () {
    navegacion.classList.toggle('on');
})
}

function modoOscuro() {
    const navegacion = document.querySelector('.navegacion a:last-of-type');
    const botonDm = navegacion;
    
    botonDm.addEventListener('click', e => {
        e.preventDefault();
        document.body.classList.toggle('dark-mode');
    })
    
    const aparienciaDm = window.matchMedia('(prefers-color-scheme: dark)');
    // console.log(aparienciaDm.matches);
    
    if (aparienciaDm.matches) {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }
    
    aparienciaDm.addEventListener('change', () => {
        if (aparienciaDm.matches) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    })
}


// if (navegacion.classList.contains('on')) {
//     navegacion.classList.remove('on');
// }else {
//     navegacion.classList.add('on');
// }