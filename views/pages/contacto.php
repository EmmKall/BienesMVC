<main class="contenedor seccion">
    <h1>Contacto</h1>

    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen Contacto">
    </picture>

    <h2>Llene el formulario de Contacto</h2>

    <div>
        <?php
            if($mensaje === true)
            {?>
            <div class="contenedor">
                <p class="alerta exito"> Se ha enviado el correo </p>
            </div>
        <?php } else
        { ?> 
            <div class="contenedor">
                <p class="alerta error"> Se no ha enviado el correo </p>
            </div>
    <?php }
        ?>
    </div>

    <form class="formulario" method="post" action="/contacto">
        <fieldset>
            <legend>Información Personal</legend>

            <label for="nombre">Nombre</label>
            <input type="text" placeholder="Tu Nombre" name="nombre" id="nombre" required>

            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" required></textarea>
        </fieldset>

        <fieldset>
            <legend>Información sobre la propiedad</legend>

            <label for="opciones">Vende o Compra:</label>
            <select id="opciones" name="opciones" required>
                <option value="" disabled selected>-- Seleccione --</option>
                <option value="Compra">Compra</option>
                <option value="Vende">Vende</option>
            </select>

            <label for="presupuesto">Precio o Presupuesto</label>
            <input type="number" name="presupuesto" placeholder="Tu Precio o Presupuesto" id="presupuesto" required>

        </fieldset>

        <fieldset>
            <legend>Información sobre la propiedad</legend>

            <p>Como desea ser contactado</p>

            <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input name="contacto" type="radio" value="telefono" id="contactar-telefono" required>

                <label for="contactar-email">E-mail</label>
                <input name="contacto" type="radio" value="email" id="contactar-email" required>
            </div>

            <div id="contacto">

            </div>

        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde">
    </form>
</main>