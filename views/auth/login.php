<main class="contenedor">
    <h1>Iniciar Sesión</h1>

    <?php
        foreach ($errores as $error): ?>
            <div class="contenedor"> <p class="alerta error"><?php echo $error; ?></p> </div>
    <?php endforeach; ?>

    <form action="/login" class="formulario login" method="POST">
        <fieldset>
            <legend>Ingresa tus credenciales</legend>
            
            <label for="User_Nombre">Usuario:</label>
            <input type="email" name="User_Nombre" id="User_Nombre" required>

            <label for="User_Password">Contraseña:</label>
            <input type="password" name="User_Password" id="User_Password" required>

        </fieldset>

        <input type="submit" value="Ingresar" class="boton boton-verde">
        
    </form>

</main>