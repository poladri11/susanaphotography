<main class="main-galeria">
    <div class="main-galeria-h1">
        <h1>Galería</h1>        
    </div>

    <div class="main-galeria-grid">

        <?php foreach($cats as $cat) { ?>
            
            <div class="main-galeria-grid-cat">
                <h2><a href="#"><?php echo $cat['name'] ?></a></h2>
                <a href="#">
                    <img class="galeria-frontimg" data-imgloaded="<?php echo $cat['imagenPrinc'] ?>" src="/build/img/gallery/placeholder-image.png" alt="Foto de categoría <?php echo $cat['name']?>">
                </a>
            </div>

        <?php } ?>
        
    </div>
</main>