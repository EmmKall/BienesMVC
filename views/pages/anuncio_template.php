<section class="seccion contenedor">
    <h2>Casas y Depas en Venta</h2>

    <div class="contenedor-anuncios">
        <?php foreach($properties as $property): ?>
            <div class="anuncio">
                <picture>
                    <!-- <source srcset="build/img/anuncio1.webp" type="image/webp"> -->
                    <source srcset="../images/<?php echo $property->P_Imagen;?>" type="image/jpeg">
                    <img loading="lazy" src="imagenes/<?php echo $property->P_Imagen;?>" alt="anuncio">
                </picture>

                <div class="contenido-anuncio">
                    <h3><?php echo $property->P_Titulo; ?></h3>
                    <p><?php echo $property->P_Descrip; ?></p>
                    <p class="precio">$<?php echo $property->P_Precio; ?></p>

                    <ul class="iconos-caracteristicas">
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                            <p><?php echo $property->P_WC; ?></p>
                        </li>
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                            <p><?php echo $property->P_Estacionamiento; ?></p>
                        </li>
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                            <p><?php echo $property->P_Habitaciones; ?></p>
                        </li>
                    </ul>
                    <a href="/propiedad?id=<?php echo $property->P_Id; ?>" class="boton-amarillo-block">Ver Propiedad</a>
                </div><!--.contenido-anuncio-->
            </div><!--anuncio-->
        <?php endforeach; ?>
    </div> <!--.contenedor-anuncios-->

    <?php if(isset($inicio) && $inicio): ?>
        <div class="alinear-derecha">
            <a href="/propiedades" class="boton-verde">Ver Todas</a>
        </div>
    <?php endif; ?>
</section>