<main class="main__admin-g">
    <div class="main__admin-g-head">
        <h1>Galerías</h1>
        <a href="/admin">Volver</a>
    </div>
    <div class="main__admin-g-body">
        <div class="main__admin-g-body-head">
            <a href="/admin/galeria/add">Añadir categoría</a>
        </div>
        <div class="main__admin-g-body-body">
            
            <?php 
            foreach ($cats as $cat) { ?>
                
                <div class="main__admin-g-body-body-c">
                    <h2><a href="#"><?php echo $cat['name']?></a></h2>
                    <a href="#">
                        <img src="<?php echo $cat['imagenPrinc']?>" alt="Foto de categoría <?php echo $cat['name']; ?>">
                    </a>
                </div>
            <?php } ?>

        </div>
    </div>
</main>