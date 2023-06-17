<main class="admin-clases-index">
    <div class="admin-clases-index-head">
        <h1>Clases</h1>
        <a href="/admin/clases/add">Nueva Clase</a>
    </div>

    <div class="admin-clases-index-body">
        
        <?php foreach($clases as $clase) { ?>
            <div class="clase">
                <div class="clase-info">
                    <div class="clase-info-head">
                        <h2> <?php echo $clase['nombre']?> </h2>
                        <a href="/admin/clases/remove?id=<?php echo $clase['id'] ?>">Eliminar</a>
                    </div>
                    <div class="clase-horario">
                        <p>Inicio: <span style="color: #8eff87; display: block;"><?php $clase['fechaInicio'] = date("d-m-Y H:i:s", strtotime($clase['fechaInicio'])); echo str_replace(" ", "\n", $clase['fechaInicio']) ?> </span> </p>
                        <p>Final: <span style="color: #ff7f7f; display: block;"><?php $clase['fechaFinal'] = date("d-m-Y H:i:s", strtotime($clase['fechaFinal'])); echo str_replace(" ", "\n", $clase['fechaFinal']) ?> </span> </p>
                    </div>
                    <div class="clase-precio">
                        <p>
                            Precio: <span><?php echo $clase['precio'] ?> € </span>
                        </p>
                        <p>
                            Precio de oferta: <span> <?php if($clase['discounted'] == 1) { echo $clase['discountedprecio'] . " €";} else { echo "Sin oferta"; }  ?> </span>
                        </p>
                    </div>
                    <p style="white-space: pre-line;"><?php echo $clase['descripcion'] ?></p>        
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
</main>
