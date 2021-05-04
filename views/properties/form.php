<fieldset>
    <legend>Información General</legend>
    <label for="P_Titulo">Titulo:</label>
    <input type="text" name="P_Titulo" id="P_Titulo" placeholder="Titulo Propiedad" value="<?php if(isset($property)) echo limpiar($property->P_Titulo);?>" required>

    <label for="P_Precio">Precio:</label>
    <input type="number" name="P_Precio" id="P_Precio" placeholder="Precio $$$" value="<?php if(isset($property)) echo limpiar($property->P_Precio);?>" required>

    <label for="imagen">Imagen:</label>
    <input type="file" name="P_Imagen" id="P_Imagen" accept="image/jpeg, image/png" <?php if(!$property->P_Imagen) echo 'required'; ?>>
    <?php
        if($property->P_Imagen): ?>
            <img class="imgForm" src="../images/<?php echo $property->P_Imagen; ?>" alt="Imagen Propiedad">
        <?php endif;
    ?>

    <label for="P_Descrip">Descripción:</label>
    <textarea name="P_Descrip" id="P_Descrip" placeholder="Descripción" required><?php if(isset($property)) echo limpiar($property->P_Descrip);?></textarea>
</fieldset>

<fieldset>
    <legend>Propiedad</legend>
    <label for="P_Habitaciones">Habitaciones:</label>
    <input type="number" name="P_Habitaciones" id="P_Habitaciones" placeholder="Número habitaciones" min="1" max="30" value="<?php if(isset($property)) echo limpiar($property->P_Habitaciones); ?>" required>

    <label for="P_WC">WC:</label>
    <input type="number" name="P_WC" id="P_WC" placeholder="Número WC" min="1" max="30" value="<?php if(isset($property)) echo limpiar($property->P_WC); ?>" required>

    <label for="P_Estacionamiento">Estacionamientos:</label>
    <input type="number" name="P_Estacionamiento" id="P_Estacionamiento" placeholder="Número estacionamientos" min="1" max="30" value="<?php if(isset($property)) echo limpiar($property->P_Estacionamiento); ?>" required>
</fieldset>

<fieldset>
    <legend>Vendedor</legend>
    <label for="P_VId">Vendedor:</label>
    <select name="P_VId" id="P_VId" required>
        <option value="" selected disabled>--Seleciona una Opción--</option>
        <?php
            foreach($sellers as $vendedor): ?>
                <option value="<?php echo limpiar($vendedor->V_Id); ?>" <?php echo ($property->P_VId === $vendedor->V_Id) ? 'selected' : ''; ?>><?php echo $vendedor->V_Nombre . ' ' . $vendedor->V_Apellido; ?></option>
        <?php endforeach; ?>
    </select>
</fieldset>