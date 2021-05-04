<?php

    use App\Propiedad;

    $propiedad = new Propiedad;
    if($_SERVER['SCRIPT_NAME'] === '/anuncios.php'){
        $propiedades = Propiedad::all();
        
    } else {
        $propiedades = Propiedad::get(3);
    }

    

?>


<section class="seccion contenedor">
        <h2>Casas y Depas en Venta</h2>

        <div class="contenedor-anuncios">
            <?php foreach($propiedades as $propiedad): ?>
            <div class="anuncio">
                <picture>
                    <!-- <source srcset="build/img/anuncio1.webp" type="image/webp"> -->
                    <source srcset="imagenes/<?php echo $propiedad->P_Imagen;?>" type="image/jpeg">
                    <img loading="lazy" src="imagenes/<?php echo $propiedad->P_Imagen;?>" alt="anuncio">
                </picture>

                <div class="contenido-anuncio">
                    <h3><?php echo $propiedad->P_Titulo; ?></h3>
                    <p><?php echo $propiedad->P_Descrip; ?></p>
                    <p class="precio">$<?php echo $propiedad->P_Precio; ?></p>

                    <ul class="iconos-caracteristicas">
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                            <p><?php echo $propiedad->P_WC; ?></p>
                        </li>
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                            <p><?php echo $propiedad->P_Estacionamiento; ?></p>
                        </li>
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                            <p><?php echo $propiedad->P_Habitaciones; ?></p>
                        </li>
                    </ul>

                    <a href="anuncio.php?id=<?php echo $propiedad->P_Id; ?>" class="boton-amarillo-block">
                        Ver Propiedad
                    </a>
                </div><!--.contenido-anuncio-->
            </div><!--anuncio-->
            <?php endforeach; ?>

        </div> <!--.contenedor-anuncios-->

        <?php if(isset($inicio) && $inicio): ?>
        <div class="alinear-derecha">
            <a href="anuncios.php" class="boton-verde">Ver Todas</a>
        </div>
        <?php endif; ?>
    </section>