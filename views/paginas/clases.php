<main class="main-clases">
    <div class="main-clases-head">
        <h1>Clases</h1>
    </div>
    <div class="main-clases-body">
        
        <div class="main-clases-body-quest">
            <h2>¿Qué son las clases?</h2>
            <p>Son clases en las que enseño como realizar distintos tipos de edición, explicando dudas comunes, y con ejemplos reales de fotos.</p>
            <p>Realizo tres tipos de clases: </p>
            <ul>
                <li>Particulares</li>
                <li>Grupales</li>
                <li>Grabadas</li>
            </ul>
        </div>
        
        <div class="main-clases-body-quest">
            <h2>¿Qué diferencias hay entre los tres tipos de clases?</h2>
            <p>La principal diferencia es que, las clases particulares, son clases dadas a una sola persona, en llamada, donde enseño como realizar la edición de foto, contestando dudas, y enviando una copia grabada al terminar por email.</p>
            <p>Las clases grupales, son un tipo de clase especial que realizo una vez al mes, donde enseño a través de una llamada grupal (con varios asistentes), como edito, explico dudas, y una copia de la clase es enviada al terminar la clase a todos los miembros por Email.</p>
            <p>Y las clases grabadas, son clases grabadas en el pasado, que cualquiera puede comprar cuando quiera.</p>
            <p>Todas las clases incluyen el material necesario para poder editar las fotos.</p>
        </div>
        
        <div class="main-clases-body-quest">
            <h2>¿Qué beneficios tiene apuntarse a una clase?</h2>
            <p>Aprenderás a editar las fotos y el proceso por el que yo paso, te daré el material necesario para lograrlo, y pasarás a formar parte de mi grupo de WhatsApp de alumnos. En el que iré resolviendo dudas, enviando fondos y material, y por el que poseerás un descuento para futuras clases.</p>
        </div>
        
        <div class="main-clases-body-quest">
            <h2>¿Cómo puedes inscribirte en las clases?</h2>
            <p>Puedes inscribirte tanto a clases particulares, como a las grupales, contactándome por <a target="_blank" href="https://wa.me/34727767251">WhatsApp</a>, <a target="_blank" href="https://www.facebook.com/susanyanire35">Facebook</a>, o <a target="_blank" href="https://instagram.com/susanagutierrezfotografia">Instagram</a>.</p>
        </div>

        <div>
            <h2>Clases disponibles: </h2>

            <div class="clases">
                <?php foreach($clases as $clase) { ?>
                    <div class="clase">
                        <div class="clase-info">
                            <p style="margin-top: 4.5rem;"> 
                                Clase: <span><?php echo $clase['nombre'] ?></span>
                            </p> 
                            <p>
                                Descripción de la clase: <span><?php echo $clase['descripcion'] ?> </span>
                            </p>
                            <p style="<?php if($clase['discounted'] == 1) { echo "right: 10rem; text-decoration: line-through; opacity: .5;";} ?>" class="clase-info-precio"><?php echo $clase['precio'] ?> €</p>
                            <p class="clase-info-precio clase-info-precio-disc">
                                <?php if($clase['discounted'] == 1) { echo $clase['discountedprecio'] . " €";} ?> 
                            </p>

                            <div class="clase-info-horario">
                                <p>
                                    Inicio: <span style="white-space: pre-line;"><?php $clase['fechaInicio'] = date("d-m-Y H:i:s", strtotime($clase['fechaInicio'])); echo str_replace(" ", "\n", $clase['fechaInicio']) ?></span>
                                </p>
                                <p>
                                    Final: <span style="white-space: pre-line;"><?php $clase['fechaFinal'] = date("d-m-Y H:i:s", strtotime($clase['fechaFinal'])); echo str_replace(" ", "\n", $clase['fechaFinal']) ?></span>
                                </p>
                            </div>
                        </div>

    
                        <div class="clase-imagenes">
                            <div class="clase-imagen">
                                <p>Antes</p>
                                <img src="<?php echo $clase['fotoInicial'] ?>" alt="Foto del antes de la clase <?php echo $clase['nombre'] ?>">
                            </div>
                            <div class="clase-imagen">
                                <p>Después</p>
                                <img src="<?php echo $clase['fotoFinal'] ?>" alt="Foto del después de la clase <?php echo $clase['nombre'] ?>">
                            </div>
                        </div>
    
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</main>