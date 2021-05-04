<fieldset>
    <legend>Información General</legend>
    <label for="P_Titulo">Titulo:</label>
    <input type="text" name="P_Titulo" id="P_Titulo" placeholder="Titulo Propiedad" value="<?php if(isset($propiedad)) echo limpiar($propiedad->P_Titulo);?>">

    <label for="P_Precio">Precio:</label>
    <input type="number" name="P_Precio" id="P_Precio" placeholder="Precio $$$" value="<?php if(isset($propiedad)) echo limpiar($propiedad->P_Precio);?>">

    <label for="imagen">Imagen:</label>
    <input type="file" name="P_Imagen" id="P_Imagen" accept="image/jpeg, image/png" <?php if(!$propiedad->P_Imagen) echo 'required'; ?>>
    <?php
        if($propiedad->P_Imagen): ?>
            <img class="imgForm" src="../../imagenes/<?php echo $propiedad->P_Imagen; ?>" alt="Imagen Propiedad">
        <?php endif;
    ?>

    <label for="P_Descrip">Descripción:</label>
    <textarea name="P_Descripcion" id="P_Descripcion" placeholder="Descripción"><?php if(isset($propiedad)) echo limpiar($propiedad->P_Descripcion);?></textarea>
</fieldset>

<fieldset>
    <legend>Propiedad</legend>
    <label for="P_Habitaciones">Habitaciones:</label>
    <input type="number" name="P_Habitaciones" id="P_Habitaciones" placeholder="Número habitaciones" min="1" max="30" value="<?php if(isset($propiedad)) echo limpiar($propiedad->P_Habitaciones); ?>" required>

    <label for="P_WC">WC:</label>
    <input type="number" name="P_WC" id="P_WC" placeholder="Número WC" min="1" max="30" value="<?php if(isset($propiedad)) echo limpiar($propiedad->P_WC); ?>" required>

    <label for="P_Estacionamiento">Estacionamientos:</label>
    <input type="number" name="P_Estacionamiento" id="P_Estacionamiento" placeholder="Número estacionamientos" min="1" max="30" value="<?php if(isset($propiedad)) echo limpiar($propiedad->P_Estacionamiento); ?>" required>
</fieldset>

<fieldset>
    <legend>Vendedor</legend>
    <label for="P_VId">Vendedor:</label>
    <select name="P_VId" id="P_VId" required>
        <option value="" selected disabled>--Seleciona una Opción--</option>
        <?php
            /* $sql = " SELECT V_Id, V_Nombre, V_Apellido, V_Telefono FROM vendedor; ";
            $resultado = mysqli_query($db, $sql); */
            foreach($vendedores as $vendedor): ?>
                <option value="<?php echo limpiar($vendedor->V_Id); ?>" <?php echo ($propiedad->P_VId === $vendedor->V_Id) ? 'selected' : ''; ?>><?php echo $vendedor->V_Nombre . ' ' . $vendedor->V_Apellido; ?></option>
        <?php endforeach; ?>
    </select>
</fieldset>