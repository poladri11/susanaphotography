<main class="admin-clases-index">
    <div class="admin-clases-index-head">
        <h1>Clases</h1>
        <a href="/admin/clases/add">Nueva Clase</a>
    </div>

    <div class="admin-clases-index-body">
        <div class="admin-clases-index-body-clases">

            <h2>Clases grupales:</h2>
            <div class="clases">
                
                <?php if(empty($clasesGrupales)) { echo "No hay clases grupales"; } ?>
                <?php foreach($clasesGrupales as $clase) { ?>
                    <div class="clase">
                        <div class="clase-info">
                            <div class="clase-info-head">
                                <img class="clase-info-icon" src="/build/img/svgs/directo.svg" alt="Icono de directo">
                                <h2> <?php echo $clase['nombre']?> </h2>
                                <a href="/admin/clases/remove?id=<?php echo $clase['id'] ?>"><img src="/build/img/svgs/delete.svg" alt="Delete Icon"></a>
                            </div>
                            <div class="clase-horario">
                                <p> Inicio: <span><?php echo $clase['fechaInicio'] ?> </span> </p>
                            </div>
                            <div class="clase-precio">
                                <p>
                                    Precio: <span><?php echo $clase['precio'] ?> € </span>
                                </p>
                                <p>
                                    Precio de oferta: <span> <?php if($clase['discounted'] == 1) { echo $clase['discountedprecio'] . " €";} else { echo "Sin oferta"; }  ?> </span>
                                </p>
                            </div>
                            <p class="clase-info-desc" style="white-space: pre-line;"><?php echo $clase['descripcion'] ?></p>        
                        </div>
        
                        <div class="clase-imagenes">
                            <div class="clase-imagen">
                                <p>Antes:</p>
                                <img src="<?php echo $clase['fotoInicial'] ?>" alt="Foto inicial">
                            </div>
                            <div class="clase-imagen">
                                <p>Después:</p>
                                <img src="<?php echo $clase['fotoFinal'] ?>" alt="Foto inicial">
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>

        <div class="admin-clases-index-body-clases">
            <h2>Clases grabadas:</h2>
            <?php if(empty($clasesGrabadas)) { echo "No hay clases grabadas"; } ?>
            <?php foreach($clasesGrabadas as $clase) { ?>
                <div class="clase">
                    <div class="clase-info">
                        <div class="clase-info-head">
                            <img class="clase-info-icon" src="/build/img/svgs/grabado1.svg" alt="Icono de grabado">
                            <h2> <?php echo $clase['nombre']?> </h2>
                            <a href="/admin/clases/remove?id=<?php echo $clase['id'] ?>"><img src="/build/img/svgs/delete.svg" alt="Delete Icon"></a>
                        </div>
                        <div class="clase-precio">
                            <p>
                                Precio: <span><?php echo $clase['precio'] ?> € </span>
                            </p>
                            <p>
                                Precio de oferta: <span> <?php if($clase['discounted'] == 1) { echo $clase['discountedprecio'] . " €";} else { echo "Sin oferta"; }  ?> </span>
                            </p>
                        </div>
                        <p class="clase-info-desc" style="white-space: pre-line;"><?php echo $clase['descripcion'] ?></p>        
                    </div>
    
                    <div class="clase-imagenes">
                        <div class="clase-imagen">
                            <p>Antes:</p>
                            <img src="<?php echo $clase['fotoInicial'] ?>" alt="Foto inicial">
                        </div>
                        <div class="clase-imagen">
                            <p>Después:</p>
                            <img src="<?php echo $clase['fotoFinal'] ?>" alt="Foto inicial">
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        
    </div>
</main>
