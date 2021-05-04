<main class="contenedor">
    <h1>Administrar Registros</h1>

    <?php
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $res = (int)$_GET['res'] ?? 0; 
            if($res === 1): ?>
                <div class="contenedor"> <p class="alerta exito">Se Ha Creado el Registro Correctamente</p> </div>
             <?php elseif($res === 2): ?>
                <div class="contenedor"> <p class="alerta exito">Se Ha Modificado el Registro Correctamente</p> </div>
             <?php elseif($res === 3): ?>
                <div class="contenedor"> <p class="alerta exito">Se Ha Eliminadox el Registro Correctamente</p> </div>
           <?php endif;
        }

        //Eliminar registo
        elseif($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = filter_var($_POST['id'], FILTER_VALIDATE_INT); 
            if( $id ){

                $tipo = $_POST['tipo'];

                if(validarTipoContenido($tipo)){
                    if($tipo === 'propiedad') $registro =  Propiedad::find($id);
                    else if($tipo === 'vendedor') $registro = Vendedor::find($id);
                    $resultado = $registro->eliminar();
                    if($resultado){
                        if($tipo === 'propiedad') $$registro->borrarImg();
                        header('Location: index.php?res=3');
                    }
                }
            } else{
                header('Location: index.php');
            }
        }
     ?>

    <h2>Propiedades</h2>

    <a href="/property/create" class="boton boton-verde">Crear Propiedad</a>
    <a href="#vendedores" class="boton boton-amarillo">Ver Vendedores</a>

    <table id="propiedades" class="propiedades">
        <thead>
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Descripción</th>
            <th>Imagen</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($properties as $registro): ?>
                <tr>
                    <td><?php echo $registro->P_Id; ?></td>
                    <td><?php echo $registro->P_Titulo; ?></td>
                    <td><?php echo $registro->P_Descrip; ?></td>
                    <td><img class="imgPropiedad" src="../images/<?php echo $registro->P_Imagen; ?>" alt="ImgPropiedad"></td>
                    <td>$<?php echo $registro->P_Precio; ?></td>
                    <td>
                        <a href="/property/update?id=<?php echo $registro->P_Id; ?>" class="boton boton-amarillo-block">Editar</a>
                        <form action="" method="POST" class="w-100">
                            <input type="hidden" name="imagen" value="<?php echo $registro->P_Imagen; ?>">
                            <input type="hidden" name="id" value="<?php echo $registro->P_Id; ?>">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" value="Eliminar" class="boton boton-rojo-block">                    
                        </form>
                    </td>
                </tr>
        <?php endforeach; ?>
    </tbody>

    <tfoot>
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Descripción</th>
            <th>Imagen</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </tfoot>
    </table>

    <h2>Vendedores</h2>

    <a href="/seller/create" class="boton boton-verde">Crear Vendedor</a>
    <a href="#propiedades" class="boton boton-amarillo">Ver Propiedades</a>

    <table id="vendedores" class="propiedades">
        <thead>
            <th>Id</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            <?php
             foreach($sellers as $vendedor): ?>
                <tr>
                    <th><?php echo $vendedor->V_Id; ?></th>
                    <th><?php echo $vendedor->V_Nombre . ' ' . $vendedor->V_Apellido; ?></th>
                    <th><?php echo $vendedor->V_Telefono; ?></th>
                    <th>
                        <a href="/seller/update?id=<?php echo $vendedor->V_Id; ?>" class="boton boton-amarillo">Editar</a>
                        <form action="" method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $vendedor->V_Id; ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" value="Eliminar" class="boton boton-rojo">
                        </form>
                    </th>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </tfoot>

    </table>

</main>