<script>
    document.addEventListener('DOMContentLoaded', () => {

    // Obtener todos los elementos de "navbar-burger"
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

    // Poner un click a cada uno de ellos
    $navbarBurgers.forEach( el => {
    el.addEventListener('click', () => {

        // Obtener el target de cada atributo data-target 
        const target = el.dataset.target;
        const $target = document.getElementById(target);

        // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
        el.classList.toggle('is-active');
        $target.classList.toggle('is-active');

    });
    });

    });
</script>

<script src="./js/ajax.js"></script>