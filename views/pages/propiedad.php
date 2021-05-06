<main class="contenedor seccion contenido-centrado">
    <h1><?php echo $property->P_Titulo; ?></h1>
    <picture>
        <!-- <source srcset="build/img/destacada.webp" type="image/webp"> -->
        <source srcset="../images/<?php echo $property->P_Imagen; ?>" type="image/jpeg">
        <img loading="lazy" src="imagenes/<?php echo $property->P_Imagen; ?>" alt="imagen de la propiedad">
    </picture>

    <div class="resumen-propiedad">
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
                <img class="icono"  loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                <p><?php echo $property->P_Habitaciones; ?></p>
            </li>
        </ul>

        <p><?php echo $property->P_Descrip; ?></p>
    </div>
</main>