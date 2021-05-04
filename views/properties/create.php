<main class="contenedor">
    <h1>Crear Propiedad</h1>
    <a href="/admin" class="boton boton-rojo">Volver</a>

    <?php if($errores):
        foreach ($errores as $error): ?>
            <div class="contenedor">
                <p class="alerta error"><?php echo $error; ?></p>
            </div>
            <?php endforeach;
    endif; ?> 

    <form action="" class="formulario" method="POST" enctype="multipart/form-data">
        <?php include_once __DIR__ . './form.php'; ?>
        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>
</main>