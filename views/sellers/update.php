<main class="contenedor">
    <h1>Actualizar Vendedor(a)</h1>
    <a href="/admin" class="boton boton-rojo">Volver</a>

    <?php if(!empty($errores)){
        foreach($errores as $error): ?>
        <div class="contenedor">
            <p class="alerta error"><?php echo $error; ?></p>
        </div>
    <?php endforeach;
    } ?>

    <form action="" method="POST" class="formulario">
        <?php include_once 'form.php'; ?>
        <input type="submit" value="Actualizar Vendedor" class="boton boton-verde">
    </form>
</main>