<main meta-cy="bloque-auth" class="contenedor">
    <h1>Iniciar Sesión</h1>

    <?php
        foreach ($errores as $error): ?>
            <div class="contenedor"> <p meta-cy="error-login"  class="alerta error"><?php echo $error; ?></p> </div>
    <?php endforeach; ?>

    <form meta-cy="form-login" action="/login" class="formulario login" method="POST">
        <fieldset>
            <legend>Ingresa tus credenciales</legend>
            
            <label for="User_Nombre">Usuario:</label>
            <input meta-cy="email" type="email" name="User_Nombre" id="User_Nombre" required>

            <label for="User_Password">Contraseña:</label>
            <input meta-cy="pass" type="password" name="User_Password" id="User_Password" required>

        </fieldset>

        <input type="submit" value="Ingresar" class="boton boton-verde">
        
    </form>

</main>