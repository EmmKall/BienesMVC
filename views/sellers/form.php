<fieldset>
    <legend>Nombre</legend>
    <label for="V_Nombre">Nombre: </label>
    <input type="text" name="V_Nombre" id="V_Nombre" placeholder="Ingresa nombre" value="<?php if(isset($seller)) echo limpiar($seller->V_Nombre); ?>" required>

    <label for="V_Apellido">Apellido: </label>
    <input type="text" name="V_Apellido" id="V_Apellido" placeholder="Ingresa apellido" value="<?php if(isset($seller)) echo limpiar($seller->V_Apellido); ?>" required>
</fieldset>

<fieldset>
    <legend>Contacto </legend>
    <label for="V_Telefono">Teléfono: </label>
    <input type="text" name="V_Telefono" id="V_Telefono" nim="10" max="15" placeholder="Ingresa Teléfono" value="<?php if(isset($seller)) echo limpiar($seller->V_Telefono); ?>" required>
</fieldset>