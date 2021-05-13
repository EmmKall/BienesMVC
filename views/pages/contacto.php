<main meta-cy="sitio-contacto" class="contenedor seccion">
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
                <p data-cy="res" class="alerta exito">Se ha enviado el correo</p>
            </div>
        <?php } else if($mensaje === false)
        { ?> 
            <div class="contenedor">
                <p data-cy="res" class="alerta error"> Se no ha enviado el correo </p>
            </div>
    <?php }
        ?>
    </div>

    <form data-cy="formulario" class="formulario" method="post" action="/contacto">
        <fieldset>
            <legend>Información Personal</legend>

            <label for="nombre">Nombre</label>
            <input data-cy="input-nombre" type="text" placeholder="Tu Nombre" name="nombre" id="nombre" required>

            <label for="mensaje">Mensaje:</label>
            <textarea data-cy="input-men" id="mensaje" name="mensaje" required></textarea>
        </fieldset>

        <fieldset>
            <legend>Información sobre la propiedad</legend>

            <label for="opciones">Vende o Compra:</label>
            <select data-cy="input-opc" id="opciones" name="opciones" required>
                <option value="" disabled selected>-- Seleccione --</option>
                <option value="Compra">Compra</option>
                <option value="Vende">Vende</option>
            </select>

            <label for="presupuesto">Precio o Presupuesto</label>
            <input data-cy="input-pre" type="number" name="presupuesto" placeholder="Tu Precio o Presupuesto" id="presupuesto" required>

        </fieldset>

        <fieldset>
            <legend>Información sobre la propiedad</legend>

            <p>Como desea ser contactado</p>

            <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input data-cy="input-for" name="contacto" type="radio" value="telefono" id="contactar-telefono" required>

                <label for="contactar-email">E-mail</label>
                <input data-cy="input-for" name="contacto" type="radio" value="email" id="contactar-email" required>
            </div>

            <div id="contacto">

            </div>

        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde">
    </form>
</main>