document.addEventListener('DOMContentLoaded', function() {

    eventListeners();

    darkMode();
});

function darkMode() {

    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');

    // console.log(prefiereDarkMode.matches);

    if(prefiereDarkMode.matches) {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }

    prefiereDarkMode.addEventListener('change', function() {
        if(prefiereDarkMode.matches) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    });

    const botonDarkMode = document.querySelector('.dark-mode-boton');
    botonDarkMode.addEventListener('click', function() {
        document.body.classList.toggle('dark-mode');
    });
}

function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navegacionResponsive);

    //Muestra campos condicionales
    const contacto = document.querySelectorAll('input[name="contacto"]');
    contacto.forEach(input => input.addEventListener('click', mostrarMetodoContacto));    
}

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');

    navegacion.classList.toggle('mostrar')
}

function mostrarMetodoContacto(e){
    const contactoDiv = document.getElementById('contacto');
    if(e.target.value === 'telefono')
    {
        contactoDiv.innerHTML = `
        <label for="telefono">Teléfono</label>
        <input meta-cy="tel" type="tel" placeholder="Tu Teléfono" name="telefono" id="telefono" required>

        <label for="fecha">Fecha:</label>
        <input meta-cy="fecha" type="date" name="fecha" id="fecha" required>

        <label for="hora">Hora:</label>
        <input meta-cy="hora" type="time" name="hora" id="hora" min="09:00" max="21:00" required>
        `;
    } else
    {
        contactoDiv.innerHTML = `
        <label for="email">E-mail</label>
        <input data-cy="email" type="email" placeholder="Tu Email" name="email" id="email" required>
        `;
    }
}